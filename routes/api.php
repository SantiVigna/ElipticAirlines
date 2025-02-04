<?php

use App\Models\Airplane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\AirplaneController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/airplanes', [AirplaneController::class, 'index'])->name('airplanesApiIndex');
Route::post('/airplanes', [AirplaneController::class, 'store'])->name('airplanesApiStore');
Route::get('/airplanes/{id}', [AirplaneController::class, 'show'])->name('airplanesApiShow');
Route::put('/airplanes/{id}', [AirplaneController::class, 'update'])->name('airplanesApiUpdate');
Route::delete('/airplanes/{id}', [AirplaneController::class, 'destroy'])->name('airplanesApiDestroy');

Route::get('/flights', [FlightController::class, 'index'])->name('flightsApiIndex');
Route::post('/flights', [FlightController::class, 'store'])->name('flightsApiStore');
Route::get('/flights/{id}', [FlightController::class, 'show'])->name('flightsApiShow');
Route::put('/flights/{id}', [FlightController::class, 'update'])->name('flightsApiUpdate');
Route::delete('/flights/{id}', [FlightController::class, 'destroy'])->name('flightsApiDestroy');


