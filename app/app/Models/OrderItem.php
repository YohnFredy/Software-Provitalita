<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'final_price',
        'pts',
        'quantity',
        'discount',
        'tax_percent',
        'tax_amount',
        'subtotal',
        'total',
        'totalPts',
    ];

    protected $casts = [

        'final_price' => 'decimal:2',
        'pts' => 'decimal:2',
        'quantity' => 'integer',
        'discount' => 'decimal:2',
        'tax_percent' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'total' => 'decimal:2',
        'totalPts' => 'decimal:2',
    ];

    protected $appends = ['total'];



    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
