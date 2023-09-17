<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Employee\EmployeeProfileController;


Route::get('/dashboard', function () {
    return view('employee.dashboard');
})->middleware(['auth:employees', 'verified'])->name('employee.dashboard');

Route::middleware('auth:employees')->group(function () {
    Route::get('/profile', [EmployeeProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [EmployeeProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [EmployeeProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/employee_auth.php';
