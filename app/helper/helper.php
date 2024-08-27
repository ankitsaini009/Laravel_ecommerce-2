<?php  

namespace App\helper;   

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\cart;
use App\Models\Category;


class helper
{   public static function displayPrice($amount)
    {
        return '₹' . number_format($amount, 2);
}


public static function getUserCart()
{
    $user = Auth::guard('users')->user();
    $cartItems = [];

    if ($user) {
        $cartItems = cart::with('products')->where('user_id', $user->id)->latest()->get();
    }    
    return $cartItems;
    $setting = Setting::orderBy('id', 'desc')->get();
    return $setting;

}

public static function getcat()
{
    $catlist = Category::orderBy('id', 'desc')->get();

    return $catlist;

}

// public static function displayPrice($amount)
// {
//     return '₹' . number_format($amount, 2);
// }

// public static function shippingcharges($amount)
// {
//     $fixedCharge = 100;
//     return number_format($amount,2);
// }

}