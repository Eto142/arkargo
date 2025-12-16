<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShipmentController;
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


// contact route

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

