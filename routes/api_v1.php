<?php

use App\Http\Controllers\API\V1\CompactDiscController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/compact-disc/index', [CompactDiscController::class, 'index'])->name('compact-disc.index');
