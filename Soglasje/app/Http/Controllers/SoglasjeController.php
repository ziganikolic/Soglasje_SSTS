<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoglasjeController extends Controller
{
    public function index()
    {
        return view('soglasje');
    }
}
