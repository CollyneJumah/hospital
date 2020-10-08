<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    //
    protected $table="county";
    protected $fillable=[
        'name'
    ];
}
