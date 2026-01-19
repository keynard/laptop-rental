<?php

use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;

// Redirect the root to the laptops list so the app has a homepage.
Route::get('/', function () {
    return redirect()->route('laptops.index');
});

Route::resource('laptops', LaptopController::class);

Route::post('/laptops/{laptop}/rent', [LaptopController::class, 'rent'])->name('laptops.rent');
Route::post('/laptops/{laptop}/return', [LaptopController::class, 'return'])->name('laptops.return');
