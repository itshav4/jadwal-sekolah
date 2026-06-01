<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

Route::apiResource(
    'jadwals',
    JadwalController::class
);