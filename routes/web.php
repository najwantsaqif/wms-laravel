<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Panggil Controller kita

// Redirect halaman awal localhost ke halaman produk
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Ini jalur AJAIB yang membuat semua rute CRUD otomatis (index, create, store, dll)
Route::resource('products', ProductController::class);