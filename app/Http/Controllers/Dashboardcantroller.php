<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboardcantroller extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');

    }
}
