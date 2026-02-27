<?php

use App\Http\Controllers\API\V1\CompactDiscController;
use Illuminate\Support\Facades\Route;

Route::get('/compact-disc/index', [CompactDiscController::class, 'index'])->name('compact-disc.index');
