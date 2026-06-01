<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get(
    '/dashboard/{hari?}',
    [JadwalController::class, 'dashboard']
)->middleware('auth')->name('dashboard');

Route::get(
    '/jadwal/create',
    function () {
        return view('create');
    }
)->middleware('auth');

Route::get(
    '/jadwal/edit/{id}',
    function ($id) {

        $jadwal =
            \App\Models\Jadwal::findOrFail($id);

        return view(
            'edit',
            compact('jadwal')
        );
    }
)->middleware('auth');

require __DIR__.'/auth.php';