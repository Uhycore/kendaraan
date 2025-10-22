<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('cars')->group(function () {
        Route::get('/', [CarsController::class, 'index'])->name('cars.index');
        Route::post('/', [CarsController::class, 'store'])->name('cars.store');
        Route::post('/{car}', [CarsController::class, 'update'])->name('cars.update');
        Route::delete('/{car}', [CarsController::class, 'destroy'])->name('cars.destroy');
    });

    Route::prefix('peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        // Route::post('/', [CarsController::class, 'storePem'])->name('peminjaman.store');
        // Route::post('/{car}', [CarsController::class, 'updatePem'])->name('peminjaman.update');
        // Route::delete('/{car}', [CarsController::class, 'destroyPem'])->name('peminjaman.destroy');
    });

    Route::prefix('users')->group(function () {
        // User management routes can be added here
        Example: Route::get('/', [UserController::class, 'index'])->name('users.index');
    });
});

require __DIR__ . '/auth.php';
