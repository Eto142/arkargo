<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminShipmentController;
use App\Http\Controllers\Admin\SendEmailController;

Route::middleware('web')->prefix('admin')->name('admin.')->group(function () {

    // Admin Auth
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/admin/change-password', [AuthController::class, 'showChangePassword'])
        ->name('change.password');

    Route::post('/admin/change-password', [AuthController::class, 'updatePassword'])
        ->name('change.password.post');

    // Protected routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/shipments', [AdminShipmentController::class, 'index'])->name('shipments');
        Route::get('/book', [AdminShipmentController::class, 'bookcargo'])->name('book');
        Route::get('/shipments/{shipment}', [AdminShipmentController::class, 'show'])->name('shipments.show');
        Route::post('/shipments/{shipment}/status', [AdminShipmentController::class, 'updateStatus'])->name('shipments.status');
        
    });


    //  Route::prefix('admin/mail')->group(function() {
    // Route::get('/compose/{user}', [MailController::class, 'compose'])->name('mail.compose');
    // Route::post('/send', [MailController::class, 'send'])->name('users.send-mail');
    // Route::get('/history', [MailController::class, 'history'])->name('admin.mail.history');

    
Route::get('/send-email', [SendEmailController::class, 'index'])->name('send.email');
Route::post('/send-email', [SendEmailController::class, 'send'])->name('send.email.post');


});
