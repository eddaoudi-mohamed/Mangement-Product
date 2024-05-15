<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

Route::group([
    "middleware" => "auth",
    'prefix' => 'Histories'
], function () {
    Route::get('/', [HistoryController::class, "index"])->name('histories.index');
    Route::get('/delete/{id}', [HistoryController::class, "delete"])->name('histories.delete');
});
