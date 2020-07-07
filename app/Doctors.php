<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    //
    protected $table='doctors';
    protected $fillable=[
        'name',
        'doctor_id',
        'email',
        'phone',
        'gender',
        'county',
        'address',
        'postalcode',
        'profile',
        'department_id',
    ];

    //department can have more than one doctor
    public function departments(){
        return $this->hasMany('App\Department');
    }
}
