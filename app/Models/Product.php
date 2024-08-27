<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function category(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }
    function subcategosry(){
        return $this->hasOne('App\Models\subcategories','id','subcategory_id');
    }
    function brand(){
        return $this->hasOne('App\Models\Brand','id','brand_id');
    }
}
