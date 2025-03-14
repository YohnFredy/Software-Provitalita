<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BinaryTotal extends Model
{

    
    protected $fillable = ['user_id', 'left_affiliates', 'right_affiliates'];
}
