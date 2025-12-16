<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/book', function () {
    return view('home.book');
});




Route::get('/shipment/book', [ShipmentController::class, 'create'])->name('shipment.create');
Route::post('/shipment/book', [ShipmentController::class, 'store'])->name('shipment.store');

Route::get('/shipment/track', [ShipmentController::class, 'trackForm'])->name('shipment.track.form');
Route::post('/shipment/track', [ShipmentController::class, 'track'])->name('shipment.track');

