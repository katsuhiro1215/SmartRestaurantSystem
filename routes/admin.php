<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminProfileController;


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admins', 'verified'])->name('admin.dashboard');

Route::middleware('auth:admins')->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/admin_auth.php';
