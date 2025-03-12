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
Route::get('flights/create' , [FlightController::class, 'create'])->name('flightsForm')->middleware('admin');;
Route::post('flights/store' , [FlightController::class, 'store'])->name('flightsStore')->middleware('admin');;
Route::get('flights/edit/{id}' , [FlightController::class, 'edit'])->name('flightEditForm')->middleware('admin');;
Route::patch('flights/update/{id}' , [FlightController::class, 'update'])->name('flightUpdate')->middleware('admin');;
Route::delete('flights/delete/{id}' , [FlightController::class, 'destroy'])->name('flightDelete')->middleware('admin');;

Route::get('airplanes' , [AirplaneController::class, 'index'])->name('airplanesIndex')->middleware('admin');;
Route::get('airplanes/create' , [AirplaneController::class, 'create'])->name('airplanesForm')->middleware('admin');
Route::post('airplanes/store' , [AirplaneController::class, 'store'])->name('airplanesStore')->middleware('admin');;
Route::get('airplanes/edit/{id}' , [AirplaneController::class, 'edit'])->name('airplaneEditForm')->middleware('admin');;
Route::patch('airplanes/update/{id}' , [AirplaneController::class, 'update'])->name('airplaneUpdate')->middleware('admin');;
Route::delete('airplanes/delete/{id}' , [AirplaneController::class, 'destroy'])->name('airplaneDelete')->middleware('admin');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
