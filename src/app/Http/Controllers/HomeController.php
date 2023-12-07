<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexAdmin()
    {
        return view('homeAdmin');
    }
    public function postloginAdmin(Request $request)
    {
    }
}
