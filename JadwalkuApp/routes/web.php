<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('jadwal.show');
