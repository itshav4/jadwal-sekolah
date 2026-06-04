<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

Route::middleware('auth')->group(function () {
    Route::apiResource(
        'jadwals',
        JadwalController::class
    );

    Route::post('jadwals/{jadwal}', [JadwalController::class, 'update']);
});