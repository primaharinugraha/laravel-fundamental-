<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list-menu/get-all-data', [MenuController::class, 'getAllData']);

Route::get('/list-menu', function () {
    return "Ini adalah halaman yang menampilkan semua menu di Cafe Amandemy";
});

Route::get('/list-menu/{namaMenu}/{harga}', [MenuController::class, 'getAllData']);
