<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legal_Advice extends Model
{
    //
        protected $table = 'legal_advices';
         protected $fillable = [
        'case_id',
        'legal_officer_id', 
        'details',
        'advised_at',
    ];

    protected $casts = [
        'advised_at' => 'datetime',
    ];
}
