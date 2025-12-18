<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ShipmentHistoryController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/book', function () {
    return view('home.book');
});


Route::get('/faq', function () {
    return view('home.faq');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/general', function () {
    return view('home.general');
});

Route::get('/special', function () {
    return view('home.special');
});




Route::get('/shipment/book', [ShipmentController::class, 'create'])->name('shipment.create');
Route::post('/shipment/book', [ShipmentController::class, 'store'])->name('shipment.store');

Route::get('/shipment/track', [ShipmentController::class, 'trackForm'])->name('shipment.track.form');
Route::post('/shipment/track', [ShipmentController::class, 'track'])->name('shipment.track');

// ✅ DELETE shipment
Route::delete('/shipment/{id}', [ShipmentController::class, 'destroy'])
    ->name('shipment.destroy');

    Route::get('/shipment/{id}/edit', [ShipmentController::class, 'edit'])
    ->name('shipment.edit');

Route::put('/shipment/{id}', [ShipmentController::class, 'update'])
    ->name('shipment.update');


    Route::get('/shipment/download/{awb}', [ShipmentController::class, 'downloadPdf'])
    ->name('shipment.download');



// Show shipment history page
Route::get('/shipment/{shipment}/history', [ShipmentHistoryController::class, 'edit'])
    ->name('shipment.history.edit');

// Add a new history entry
Route::post('/shipment/{shipment}/history', [ShipmentHistoryController::class, 'store'])
    ->name('shipment.history.add');


// Edit a specific history entry (update)
Route::put('/shipment/history/{history}', [ShipmentHistoryController::class, 'update'])
    ->name('shipment.history.entry.update');

// Show edit page for a single history entry
Route::get('/shipment/history/{history}/edit', [ShipmentHistoryController::class, 'edithistory'])
    ->name('shipment.history.entry.edit');


// Delete a specific history entry
Route::delete('/shipment/history/{history}', [ShipmentHistoryController::class, 'destroy'])
    ->name('shipment.history.destroy');


// contact route

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

