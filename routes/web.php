<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('Welcome');
});
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::post('/user',[UserController::class,'store']);
Route::get('/user/{user}/edit',[UserController::class,'edit']);
Route::put('/user/{user}',[UserController::class,'update']);
Route::delete('/user/{user}',[UserController::class,'destroy']);
Route::get('/user/create',[UserController::class,'create']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
