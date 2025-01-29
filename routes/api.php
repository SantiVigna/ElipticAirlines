<?php

use App\Models\Airplane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\AirplaneController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/airplanes', [AirplaneController::class, 'index'])->name('airplanesIndex');
Route::post('/airplanes', [AirplaneController::class, 'store'])->name('airplanesStore');
Route::get('/airplanes/{id}', [AirplaneController::class, 'show'])->name('airplanesShow');
Route::put('/airplanes/{id}', [AirplaneController::class, 'update'])->name('airplanesUpdate');
Route::delete('/airplanes/{id}', [AirplaneController::class, 'destroy'])->name('airplanesDestroy');

Route::get('/flights', [FlightController::class, 'index'])->name('flightsIndex');
Route::post('/flights', [FlightController::class, 'store'])->name('flightsStore');
Route::get('/flights/{id}', [FlightController::class, 'show'])->name('flightsShow');
Route::put('/flights/{id}', [FlightController::class, 'update'])->name('flightsUpdate');
Route::delete('/flights/{id}', [FlightController::class, 'destroy'])->name('flightsDestroy');


