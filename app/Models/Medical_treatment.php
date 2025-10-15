<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_treatment extends Model
{
    //
    protected $fillable = [
        'case_id',
        'doctor_id',
        'details',
        'treated_at',
    ];

    public function medicalTreatments()
{
    return $this->hasMany(Medical_treatment::class, 'case_id');
}

public function case()
{
    return $this->belongsTo(Casse::class, 'case_id'); // use your actual model name
}


}
