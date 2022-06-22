<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    
    public function store()     //store -> v tem primeru ne shani nicesar (uporabljeno pri login in regster)
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
