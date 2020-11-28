<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    //
    protected $table='doctors';
    
    protected $fillable=[
        'name',
        'email',
        'phone',
        'gender',
        'county_id',
        'address',
        'postalcode',
        'profile',
        'department_id',
        'created_by'
    ];

    //department can have more than one doctor
    public function departments(){
        return $this->belongsTo(Department::class,'department_id');
        
    }
    public function county(){
        return $this->belongsTo(County::class,'county_id');
        
    }
    public function appointments(){
        return $this->hasMany(Appointments::class,'doctor_id');
        
    }
}
