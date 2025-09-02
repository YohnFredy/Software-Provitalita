<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_time',
        'ip_address',
        'user_agent',
        'referrer_url',
        'landing_page_url',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'video_played',
        'video_paused',
        'video_resumed',
        'video_max_watch_time',
        // 'video_total_watch_time', // Opcional, más complejo
        'video_completed',
        'video_duration',
        'clicked_whatsapp',
        'whatsapp_click_time',
        'honeypot_field', // Para protección spam
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'visit_time' => 'datetime',
        'whatsapp_click_time' => 'datetime',
        'video_played' => 'boolean',
        'video_paused' => 'boolean',
        'video_resumed' => 'boolean',
        'video_completed' => 'boolean',
        'clicked_whatsapp' => 'boolean',
    ];
}
