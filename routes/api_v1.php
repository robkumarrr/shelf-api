<?php

use App\Http\Controllers\API\V1\CompactDiscController;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth:sanctum"])->group(function() {
    Route::apiResource('compact-disc',CompactDiscController::class);
});
