<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social_Support extends Model
{
    //
        protected $table = 'social_supports';

          protected $fillable = [
        'case_id',
        'social_worker_id', 
        'details',
        'supported_at',
    ];

    protected $casts = [
        'supported_at' => 'datetime',
    ];
}
