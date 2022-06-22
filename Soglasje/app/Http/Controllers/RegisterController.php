<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['guest']);
        $this->middleware(['auth']);

    }
    public function index(){
        if(auth()->user()->vloga != 1){
            return view('auth.register');
        }else{
            return redirect()->route('home');
        }
    }
    public function store(Request $request){
        $this->validate($request, [   //pravila 
            'ime' => 'required|max:255',     //pravila so v laravel doc (max:255...)
            'priimek' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);   
        User::create([
            'ime' => $request->ime,
            'priimek' => $request->priimek,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'oddelek' => $request->oddelek,
            'vloga' =>$request->vloga,
        ]);
        auth()->attempt($request->only('email','password'));
        if(auth()->user()->vloga != 1){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('home');
        }
    }
}

