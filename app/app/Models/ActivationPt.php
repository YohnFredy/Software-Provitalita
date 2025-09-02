<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationPt extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_pts_first',
        'min_pts_monthly',
    ];
}
