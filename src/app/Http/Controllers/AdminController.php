<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin(){ 
        return view('home');
    }
    public function postloginAdmin(Request $request){
        
    }
}
