<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::group([
    "middleware" => "auth",
    'prefix' => "products"
], function () {
    Route::get("/", [ProductController::class, "index"])->name('products.index');
    Route::get("/create", [ProductController::class, "create"])->name('products.create');
    Route::get("show/{id}", [ProductController::class, "show"])->name('products.show');
    Route::get("edite/{id}", [ProductController::class, "edite"])->name('products.edite');
    Route::post("/store", [ProductController::class, "store"])->name('products.store');
    Route::post("/update/{id}", [ProductController::class, "update"])->name('products.update');
    Route::get("/delete/{id}", [ProductController::class, "delete"])->name('products.delete');
    Route::get("/search", [ProductController::class, "search"])->name('products.sheach');
});
