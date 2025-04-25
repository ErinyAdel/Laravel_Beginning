<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('welcome', function () 
{
    return "Welcome To Get API";
});

Route::get('welcome2', [WelcomeController::class, 'welcomeApi']);

Route::get('callIndex', action: [WelcomeController::class, 'index']);

Route::get('getUser1/{id}', action: [WelcomeController::class, 'GetUser1']);
Route::get('getUser2/{id}', action: [WelcomeController::class, 'GetUser2']);