<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROUTE MAHASISWA (Dari Praktikum Modul)
Route::get('/mahasiswa/export-csv', [MahasiswaController::class, 'exportCsv'])->name('mahasiswa.export-csv');
Route::get('/mahasiswa/print', [MahasiswaController::class, 'print'])->name('mahasiswa.print');
Route::resource('mahasiswa', MahasiswaController::class);

// ROUTE JURUSAN (Tugas Tambahan)
Route::get('/jurusan/export-excel', [JurusanController::class, 'exportExcel'])->name('jurusan.export-excel');
Route::get('/jurusan/print', [JurusanController::class, 'print'])->name('jurusan.print');
Route::resource('jurusan', JurusanController::class);

// ROUTE MATAKULIAH (Tugas Tambahan)
Route::get('/matakuliah/export-excel', [MatakuliahController::class, 'exportExcel'])->name('matakuliah.export-excel');
Route::get('/matakuliah/print', [MatakuliahController::class, 'print'])->name('matakuliah.print');
Route::resource('matakuliah', MatakuliahController::class);

require __DIR__ . '/auth.php';
