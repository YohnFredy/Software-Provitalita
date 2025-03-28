<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentWebhook extends Model
{

    protected $fillable = [
        'payment_gateway', // Pasarela de pago (Stripe, PayPal, etc.)
        'reference', // Relacionado con 'public_order_number' en 'orders'
        'payload', // Datos completos en JSON de la pasarela
    ];
    protected $casts = [
        'payload' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'reference', 'public_order_number');
    }
}
