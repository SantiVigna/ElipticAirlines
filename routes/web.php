<?php

use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('flights' , [FlightController::class, 'index'])->name('flightsIndex');
Route::get('flights/create' , [FlightController::class, 'create'])->name('flightsForm');
Route::post('flights/store' , [FlightController::class, 'store'])->name('flightsStore');
Route::get('flights/edit/{id}' , [FlightController::class, 'edit'])->name('flightEditForm');
Route::patch('flights/update/{id}' , [FlightController::class, 'update'])->name('flightUpdate');
Route::delete('flights/delete/{id}' , [FlightController::class, 'destroy'])->name('flightDelete');

Route::get('airplanes' , [AirplaneController::class, 'index'])->name('airplanesIndex');
Route::get('airplanes/create' , [AirplaneController::class, 'create'])->name('airplanesForm');
Route::post('airplanes/store' , [AirplaneController::class, 'store'])->name('airplanesStore');
Route::get('airplanes/edit/{id}' , [AirplaneController::class, 'edit'])->name('airplaneEditForm');
Route::patch('airplanes/update/{id}' , [AirplaneController::class, 'update'])->name('airplaneUpdate');
Route::delete('airplanes/delete/{id}' , [AirplaneController::class, 'destroy'])->name('airplaneDelete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
