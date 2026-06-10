<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MahasiswaApi;

Route::apiResource('mahasiswa', MahasiswaApi::class);
Route::get('mahasiswa/{id}', [MahasiswaApi::class, 'show']);
Route::post('mahasiswa', [MahasiswaApi::class, 'store']);
Route::put('mahasiswa/{id}', [MahasiswaApi::class, 'update']);
Route::delete('mahasiswa/{id}', [MahasiswaApi::class, 'destroy']);
