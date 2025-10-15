<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    //
  protected $fillable = [
    'name',
    'id_number',
    'id_image',
    'phone',
    'violence_type',
    'address',
    'other_details'
];

public function cases()
{
    return $this->hasMany(\App\Models\Casse::class, 'victim_id'); // adjust table/model name
}


}
