<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table="departments";
    
    protected $fillable=[
        'name',
        'description'
    ];
    public function doctors()
    {
        return $this->belongsTo('App\Doctors','department_id');
    }
}
