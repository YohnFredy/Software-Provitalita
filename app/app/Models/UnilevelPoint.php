<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnilevelPoint extends Model
{
    protected $fillable = ['user_id', 'personal', 'points', 'is_locked', 'approved'];
}
