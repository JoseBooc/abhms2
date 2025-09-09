<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin', function () { return view('admin.dashboard'); })->name('admin.dashboard');
});

Route::middleware(['auth', 'verified', 'role:tenant'])->group(function () {
    Route::get('/tenant', function () { return view('tenant.dashboard'); })->name('tenant.dashboard');
});

Route::middleware(['auth', 'verified', 'role:staff'])->group(function () {
    Route::get('/staff', function () { return view('staff.dashboard'); })->name('staff.dashboard');
});

Route::get('/reservations', function () { return view('reservations.index'); })->name('reservations.index');

require __DIR__.'/auth.php';
