<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casse extends Model
{
    //
    protected $fillable = [
        'victim_id',
        'investigator_id',
        'status',
        'opened_at',
        'closed_at',
        'solver',
        'solver_approved'
    ];
 

// App\Models\Casse.php

// App\Models\Casse.php
// App\Models\CaseModel.php
// App\Models\Casse.php or CaseModel.php
public function testimonies()
{
    return $this->hasMany(Testimony::class, 'case_id'); // specify foreign key
}


 public function gbvSupport()
    {
        return $this->hasMany(Gbv_Support::class, 'case_id', 'id');
    }


    public function psychologicalSupport()
    {
        return $this->hasMany(Psychological_Support::class, 'case_id', 'id');
    }

     public function legalAdvice()
    {
        return $this->hasMany(Legal_Advice::class, 'case_id', 'id');
    }

      public function socialSupport()
    {
        return $this->hasMany(Social_Support::class, 'case_id', 'id');
    }


      public function medicalTreatment()
    {
        return $this->hasMany(Medical_Treatment::class, 'case_id', 'id');
    }
    
 
    public function victim()
{
    return $this->belongsTo(Victim::class, 'victim_id');
}

public function solverUser()
{
    return $this->belongsTo(User::class, 'solver');
}








public function medicalTreatments()
{
    return $this->hasMany(Medical_treatment::class, 'case_id');
}

// public function victim()
// {
//     return $this->belongsTo(Victim::class);
// }


}
