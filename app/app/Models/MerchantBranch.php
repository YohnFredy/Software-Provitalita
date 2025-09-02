<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'city',
        'address',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
