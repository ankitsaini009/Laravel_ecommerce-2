<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;
    function Country(){
        return $this->hasOne('App\Models\Country','id','country_id');
    }
}
