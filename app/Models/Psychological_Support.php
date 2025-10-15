<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Psychological_Support extends Model
{
    //

     protected $table = 'psychological_supports';

     

    protected $fillable = [
        'case_id',
        'counselor_id', 
        'details',
        'supported_at',
    ];

    protected $casts = [
        'supported_at' => 'datetime',
    ];
}
