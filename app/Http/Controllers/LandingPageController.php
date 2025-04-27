<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandingPageController extends Controller
{
    /**
     * Muestra la página de captura.
     */
    public function show(Request $request)
    {
        // Crear un registro inicial de la visita (algunos datos se actualizarán después con AJAX)
        $visit = Visit::create([
            'visit_time' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referrer_url' => $request->headers->get('referer'), // Puede ser null o no fiable
            'landing_page_url' => $request->fullUrl(),

            // Capturar parámetros UTM de la URL
            'utm_source'   => $request->query('utm_source'),
            'utm_medium'   => $request->query('utm_medium'),
            'utm_campaign' => $request->query('utm_campaign'),
            'utm_term'     => $request->query('utm_term'),
            'utm_content'  => $request->query('utm_content'),

            // Inicializar campos de video y acción
            'video_played' => false,
            'video_completed' => false,
            'clicked_whatsapp' => false,
        ]);

        // Pasamos el ID de la visita a la vista para que el JS pueda usarlo
        return view('landing', ['visitId' => $visit->id]);
    }

    /**
     * Recibe y guarda eventos de seguimiento (video, clics) enviados por JavaScript.
     */
    public function trackEvent(Request $request)
    {
        // Validación básica (puedes expandirla según necesites)
        $validated = $request->validate([
            'visit_id' => 'required|integer|exists:visits,id',
            'event_type' => 'required|string',
            'data' => 'nullable|array', // Datos adicionales específicos del evento
            'honeypot' => 'nullable|string|max:0', // Validación Honeypot básica
        ]);

        // Protección Anti-Spam Honeypot: Si el campo oculto tiene valor, es probable que sea un bot.
        if (!empty($validated['honeypot'])) {
             Log::warning('Honeypot triggered for visit ID: ' . $validated['visit_id']);
             return response()->json(['status' => 'spam_detected'], 403); // O simplemente retornar 200 OK para no alertar al bot
        }

        $visit = Visit::find($validated['visit_id']);
        if (!$visit) {
            return response()->json(['status' => 'error', 'message' => 'Visit not found'], 404);
        }

        $eventType = $validated['event_type'];
        $data = $validated['data'] ?? [];

        try {
            switch ($eventType) {
                case 'video_play':
                    $visit->video_played = true;
                    $visit->video_duration = $data['duration'] ?? $visit->video_duration; // Guardar duración al primer play
                    break;
                case 'video_pause':
                    $visit->video_paused = true;
                    break;
                case 'video_resume':
                    $visit->video_resumed = true;
                     // Reiniciar pausa si se reanuda (opcional, depende de qué quieras medir)
                    $visit->video_paused = false;
                    break;
                case 'video_timeupdate':
                    $currentTime = $data['currentTime'] ?? 0;
                    // Actualizar el tiempo máximo visto si el actual es mayor
                    if ($currentTime > $visit->video_max_watch_time) {
                        $visit->video_max_watch_time = $currentTime;
                    }
                    // Opcional: lógica para video_total_watch_time (más compleja)
                    break;
                case 'video_ended':
                    $visit->video_completed = true;
                    // Asegurarse de que el tiempo máximo visto sea la duración total
                    $visit->video_max_watch_time = $data['duration'] ?? $visit->video_duration ?? $visit->video_max_watch_time;
                    break;
                case 'whatsapp_click':
                    $visit->clicked_whatsapp = true;
                    $visit->whatsapp_click_time = now();
                    break;
                // Puedes añadir más eventos si es necesario
            }

            $visit->save();

            return response()->json(['status' => 'success', 'message' => 'Event tracked: ' . $eventType]);

        } catch (\Exception $e) {
            Log::error('Error tracking event: ' . $e->getMessage(), ['visit_id' => $visit->id, 'event' => $eventType]);
            return response()->json(['status' => 'error', 'message' => 'Internal server error'], 500);
        }
    }
}
