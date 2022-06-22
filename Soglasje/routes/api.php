<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrivolitevController;
use App\Http\Controllers\Api;
use App\Http\Controllers\Api\UserController;


use App\Http\Controllers\api\StanjeSoglasjaController;



use App\Models\stanje_soglasja;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//
Route::get('/privolitev', [PrivolitevController::class, 'index']);


// Route::resource('Stanje_soglasja', 'StanjeSoglasjaController'); //soglasjas ??s??


// Route::get('/stanje_soglasja', 'App\Http\Controllers\api\StanjeSoglasjaController@index');
// Route::post('/stanje_soglasja', 'StanjeSoglasjaController@store');


//STANJE SOGLASJA
Route::resource('stanje_soglasja', 'App\Http\Controllers\api\StanjeSoglasjaController');
Route::get('/stanje_soglasja/{id}', [StanjeSoglasjaController::class], 'show');
Route::delete('/stanje_soglasja/{id}', [StanjeSoglasjaController::class], 'destroy');
Route::post('/stanje_soglasja/all/', [StanjeSoglasjaController::class, 'destroyALL']);

// Route::get('/stanje_soglasja', 'App\Http\Controllers\api\StanjeSoglasjaController@index');
// Route::post('/stanje_soglasja', 'StanjeSoglasjaController@store');

//USERS
Route::get('/users', [UserController::class, 'User']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::post('/users/', [UserController::class, 'saveExcelUsers']);
Route::post('/users/all/', [UserController::class, 'destroyALL']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('users/{id}/stanje_soglasja/{user_id}');
