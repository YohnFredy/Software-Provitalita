<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessData extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id', // ¡Asegúrate de que coincida con tu migración!
        'phone',
        'email',
        'country_id',
        'department_id',
        'city_id',
        'city',
        'address',
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
