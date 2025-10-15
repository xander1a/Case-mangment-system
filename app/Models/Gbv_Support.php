<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gbv_Support extends Model
{
    //
    protected $fillable = [
        'case_id',
        'gbv_officer_id',
        'provided_items',
        'supported_at',
    ];

    protected $table = 'gbv_supports';

    protected $casts = [
    'supported_at' => 'datetime',
];


 public function case()
    {
        return $this->belongsTo(Casse::class, 'case_id');
    }

    public function officer()
    {
        return $this->belongsTo(User::class, 'gbv_officer_id');
    }

}
