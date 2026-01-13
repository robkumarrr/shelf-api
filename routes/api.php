<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::post('/logout', LogoutController::class)->middleware('auth:sanctum')->name('logout');
