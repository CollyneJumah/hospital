<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table="departments";
    
    protected $fillable=[
        'name',
        'description',
        'created_by'
    ];
    public function doctors(){
        return $this->hasOne(Doctors::class,'department_id');
        
    }
    public function appointments(){
        return $this->hasMany(Appointments::class,'department_id');
        
    }

}
