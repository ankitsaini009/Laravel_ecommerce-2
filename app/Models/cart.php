<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $primaryKey ="id";

    protected $fillable = [
        'product_id'
    ];
    function products(){
        return $this->hasOne('App\Models\product', 'id', 'product_id');
    }
}
