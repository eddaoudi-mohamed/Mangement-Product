<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group([
    "middleware" => "auth",
    'prefix' => 'categories'
], function () {
    Route::get('/', [CategoryController::class, "index"])->name('categories.index');
    Route::get('/create', [CategoryController::class, "create"])->name('categories.create');
    Route::post('/store', [CategoryController::class, "store"])->name('categories.store');
    Route::get('/delete/{id}', [CategoryController::class, "delete"])->name('categories.delete');
});
