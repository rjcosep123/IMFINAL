<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

// Dashboard route (protected with auth middleware)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Hospital staff management routes (using correct controller)
Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');            // View all staff
Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');   // Form to add staff
Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');           // Save staff via procedure
Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');// Delete staff
Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');    // Edit staff form
Route::put('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');     // Update staff record

// Search staff route
Route::get('/staff/search', [StaffController::class, 'search'])->name('staff.search');

use App\Http\Controllers\WardController;

Route::get('/wards', [WardController::class, 'index'])->name('wards.index');