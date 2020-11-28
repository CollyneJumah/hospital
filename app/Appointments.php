<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    //
    protected $fillable = [
        'patient_id',
        'department_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'email',
        'phone',
        'remark',
        'status',
        'created_by'
    ];    
    
    public function patients(){
        return $this->belongsTo(Patients::class,'patient_id');
    } 

    public function departments(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function doctors(){
        return $this->belongsTo(Doctors::class,'doctor_id');
        
    }


    
}
