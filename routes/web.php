<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/', [CarController::class, 'dashboardData'])->name('dashboard');

// Route untuk Jual Mobil
Route::prefix('jual-mobil')->name('jual-mobil.')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('/create', [CarController::class, 'create'])->name('create');
    Route::post('/', [CarController::class, 'store'])->name('store');
    Route::get('/{car}/edit', [CarController::class, 'edit'])->name('edit');
    Route::put('/{car}', [CarController::class, 'update'])->name('update');
    Route::delete('/{car}', [CarController::class, 'destroy'])->name('destroy');
});

// Route untuk Beli Mobil
Route::prefix('beli-mobil')->name('beli-mobil.')->group(function () {
    Route::get('/', [CarController::class, 'beliIndex'])->name('index');
    Route::get('/{car}', [CarController::class, 'beliShow'])->name('show');
});


