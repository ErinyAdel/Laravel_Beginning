<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TaskController;

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

// Route::post('createTask', [TaskController::class, 'store']);
// Route::get('getTasks', action: [TaskController::class, 'index']);
// Route::get('getTask/{id}', action: [TaskController::class, 'getById']);
// Route::put('updateTask/{id}', action: [TaskController::class, 'update']);
// Route::delete('deleteTask/{id}', action: [TaskController::class, 'delete']);
Route::apiResource("tasks", TaskController::class);