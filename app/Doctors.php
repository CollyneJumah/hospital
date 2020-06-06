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
        'department',
    ];
}
