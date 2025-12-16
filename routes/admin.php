<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminShipmentController;

Route::middleware('web')->prefix('admin')->name('admin.')->group(function () {

    // Admin Auth
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/shipments', [AdminShipmentController::class, 'index'])->name('shipments');
        Route::get('/shipments/{shipment}', [AdminShipmentController::class, 'show'])->name('shipments.show');
        Route::post('/shipments/{shipment}/status', [AdminShipmentController::class, 'updateStatus'])->name('shipments.status');
    });

});
