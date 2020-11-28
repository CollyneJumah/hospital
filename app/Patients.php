<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    //
    protected $table="patients";
    protected $fillable=[
        'first_name',
        'last_name',
        'patient_id',
        'phone',
        'email',
        'date_of_birth',
        'gender',
        'address',
        'county',
        'postal_code',
        'created_by'
    ];

    public function appointments(){
        return $this->hasMany(Appointments::class,'patient_id');
        
    }

}
