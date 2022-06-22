<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (!auth()->attempt($request->only('email','password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }   //$request->remember se shrani v cookies in preveri v podatkovni bazi (LARAVEL funkcija)
        
        if(auth()->user()->vloga != 1){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('home');
        }
    }
}
