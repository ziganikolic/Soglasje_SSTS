<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user()->vloga == 1){
            return view('home');
        }else{
            return redirect()->route('dashboard');
        }
    }
}
