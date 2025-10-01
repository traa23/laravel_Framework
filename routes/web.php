<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');


Route::get('/nama/{param1?}/{nim?}', function ($param1= '', $nim= '') {
    return 'Nama saya: '.$param1. '<br> nim : '.$nim;
});

Route::get('/about', function () {
    return view('halaman-about');
});
