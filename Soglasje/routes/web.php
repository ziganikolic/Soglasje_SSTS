<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SoglasjeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\userSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HOME
Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
    
//SOGLASJE
Route::get('/soglasje', [SoglasjeController::class, 'index'])
    ->name('soglasje')
    ->middleware('auth');

//LOGOUT
Route::post('/logout', [LogoutController::class, 'store'])  //post ker je uporabljena forma (CSRF)
    ->name('logout'); 

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');   
Route::post('/login', [LoginController::class, 'store']);   

//REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');   //->name (damo ime, če se rutta v prihodnosti spremeni) 
Route::post('/register', [RegisterController::class, 'store']);   //store je funkcija v RegisterController

//UserSettings
Route::get('/userSettings', [userSettingsController::class, 'index'])
    ->name('userSettings');

//INDEX
Route::get('/index', [IndexController::class, 'index'])
    ->name('index');

Route::get('/', function () {
    return view('app');
});




//Za vuejs (vse kombinaciej v url grejo v vue)
Route::any('/{any}',function(){
    return view('app');
})->where('any','.*');