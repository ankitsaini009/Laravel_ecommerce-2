<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    function country(){
        return $this->hasOne('App\Models\country','id','country_id');
    }
    function State(){
        return $this->hasOne('App\Models\State','id','state_id');
    }
}
