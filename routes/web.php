<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return redirect()->route('products.index');
})->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__ . '/auth.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/web/Category.php';
require __DIR__ . '/web/Product.php';
require __DIR__ . '/web/History.php';
