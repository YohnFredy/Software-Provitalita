// Accede a los datos pasados desde Blade
const visitId = window.fornuviTracking?.visitId;
const trackUrl = window.fornuviTracking?.trackUrl;
const csrfToken = window.fornuviTracking?.csrfToken;

// --- Elementos DOM ---
const videoElement = document.getElementById('fornuvi-video');
const whatsappButton = document.getElementById('whatsapp-button');
const whatsappActionButtons = document.querySelectorAll('.whatsapp-action-button'); // Todos los botones de WhatsApp
const honeypotInput = document.getElementById('hp_field');

// --- Configuración ---
const showButtonAfterSeconds = 15; // Mostrar botón después de X segundos de reproducción
const showButtonOnVideoEnd = true; // Mostrar botón también cuando el video termina
let timeUpdateThrottleTimer;
const timeUpdateInterval = 3000; // Enviar actualización de tiempo cada 3 segundos (ajustable)
let buttonShown = false; // Para evitar mostrar el botón múltiples veces

// --- Función para enviar eventos al backend usando Fetch API ---
const trackEvent = (eventType, data = {}) => {
    if (!visitId || !trackUrl) {
        console.error('Tracking Visit ID or URL not found.');
        return;
    }

    // Validar que tenemos el token CSRF
    if (!csrfToken) {
        console.error('CSRF Token not found. Tracking request aborted.');
        return;
    }

    const payload = {
        visit_id: visitId,
        event_type: eventType,
        data: data,
        honeypot: honeypotInput ? honeypotInput.value : '', // Incluir valor del Honeypot
        // _token: csrfToken // El token CSRF se envía en las cabeceras con fetch
    };

    // Configuración para la petición Fetch
    const fetchOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // Indicamos que enviamos JSON
            'Accept': 'application/json',       // Indicamos que esperamos recibir JSON
            'X-CSRF-TOKEN': csrfToken           // Cabecera estándar de Laravel para protección CSRF
        },
        body: JSON.stringify(payload) // Convertimos el objeto JS a una cadena JSON
    };

    // Realizamos la petición Fetch
    fetch(trackUrl, fetchOptions)
        .then(response => {
            // Fetch no rechaza la promesa por errores HTTP (4xx, 5xx),
            // así que debemos comprobar la propiedad 'ok'.
            if (!response.ok) {
                // Si la respuesta no fue exitosa (status no está en el rango 200-299)
                // Intentamos leer el cuerpo de la respuesta por si el servidor envió detalles del error
                return response.json().catch(() => {
                     // Si el cuerpo no es JSON o hay otro error al parsear, lanzamos un error genérico
                    throw new Error(`HTTP error! status: ${response.status} ${response.statusText}`);
                }).then(errorData => {
                    // Si pudimos parsear el JSON de error, lo incluimos en el error lanzado
                     throw new Error(`HTTP error! status: ${response.status} - ${errorData.message || response.statusText}`);
                });
            }
            // Si la respuesta es exitosa, parseamos el JSON
            return response.json();
        })
        .then(data => {
            // Éxito - La data contiene la respuesta JSON del servidor (e.g., { status: 'success', ... })
            // console.log(`Event ${eventType} tracked successfully:`, data); // Para depuración
        })
        .catch(error => {
            // Capturamos errores de red o los errores que lanzamos manualmente arriba
            console.error(`Error tracking event ${eventType}:`, error.message || error);
        });
};


// --- Lógica para mostrar el botón de WhatsApp ---
const showWhatsAppButton = () => {
    if (whatsappButton && !buttonShown) {
        whatsappButton.classList.add('visible');
        buttonShown = true; // Marcar como mostrado
        // console.log('WhatsApp button shown');
    }
};

// --- Event Listeners del Video ---
if (videoElement) {
    let hasPlayed = false; // Para enviar el evento 'play' solo la primera vez

    videoElement.addEventListener('play', () => {
        if (!hasPlayed) {
            trackEvent('video_play', { duration: videoElement.duration });
            hasPlayed = true;
        } else {
            trackEvent('video_resume');
        }
        // console.log('Video playing/resumed');
    });

    videoElement.addEventListener('pause', () => {
        // Ignorar la pausa que ocurre al final del video
        if (!videoElement.ended) {
            trackEvent('video_pause');
            // console.log('Video paused');
        }
    });

    videoElement.addEventListener('timeupdate', () => {
        // Limitar la frecuencia de envío de 'timeupdate' para no sobrecargar
        clearTimeout(timeUpdateThrottleTimer);
        timeUpdateThrottleTimer = setTimeout(() => {
            // Solo enviar si el video tiene una duración válida (evita enviar 0 o NaN)
            if (videoElement.duration && isFinite(videoElement.duration)) {
                 trackEvent('video_timeupdate', { currentTime: videoElement.currentTime });
                // console.log('Video timeupdate:', videoElement.currentTime);

                // Mostrar botón después de X segundos si aún no se ha mostrado
                if (videoElement.currentTime >= showButtonAfterSeconds && !buttonShown) {
                    showWhatsAppButton();
                }
            }
        }, timeUpdateInterval);
    });

    videoElement.addEventListener('ended', () => {
        // Solo enviar si el video tiene una duración válida
        if (videoElement.duration && isFinite(videoElement.duration)) {
            trackEvent('video_ended', { duration: videoElement.duration });
            // console.log('Video ended');
            if (showButtonOnVideoEnd) {
                showWhatsAppButton(); // Asegurar que el botón se muestre al final
            }
        }
    });

} else {
    console.error('Video element #fornuvi-video not found.');
}

// --- Event Listener para el clic en el botón de WhatsApp ---
// Usamos event delegation
document.body.addEventListener('click', function(event) {
    const button = event.target.closest('.whatsapp-action-button, #whatsapp-button');
    if (button) {
        if (button.tagName === 'A' && button.target === '_blank') {
             trackEvent('whatsapp_click');
             // console.log('WhatsApp button clicked');
             // La navegación a WhatsApp ocurrirá automáticamente por el href
        }
    }
});

