<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owner\OwnerProfileController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [OwnerProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [OwnerProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [OwnerProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/owner_auth.php';
