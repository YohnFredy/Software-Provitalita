<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id',
        'merchant_id',
        'invoice_number_ocr',
        'total_amount_ocr',
        'invoice_date_ocr',
        'currency_ocr',
        'supplier_name_ocr',
        'supplier_id_number_ocr',
        'image_path',
        'raw_ocr_response',
        'status',
        'review_notes',
    ];

    protected $casts = [
        'invoice_date_ocr' => 'date',
        'raw_ocr_response' => 'array', // Para convertir el JSON a array automáticamente
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function merchantBranch()
{
    return $this->belongsTo(MerchantBranch::class);
}
}
