<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Employee\EmployeeProfileController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:employees')->group(function () {
    Route::get('/profile', [EmployeeProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [EmployeeProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [EmployeeProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/employee_auth.php';
