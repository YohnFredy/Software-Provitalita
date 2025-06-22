<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identification_number',
        'city',
        'address',
        'phone',
        'email',
        'is_active',
    ];

    public function branches()
    {
        return $this->hasMany(MerchantBranch::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
