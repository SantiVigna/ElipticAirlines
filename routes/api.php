<?php

use App\Models\Airplane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\AirplaneController;
use App\Http\Controllers\Api\ReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/airplanes', [AirplaneController::class, 'index'])->name('airplanesApiIndex');
Route::post('/airplanes', [AirplaneController::class, 'store'])->middleware('apiAdmin')->name('airplanesApiStore');
Route::get('/airplanes/{id}', [AirplaneController::class, 'show'])->name('airplanesApiShow');
Route::put('/airplanes/{id}', [AirplaneController::class, 'update'])->middleware('apiAdmin')->name('airplanesApiUpdate');
Route::delete('/airplanes/{id}', [AirplaneController::class, 'destroy'])->middleware('apiAdmin')->name('airplanesApiDestroy');

Route::get('/flights', [FlightController::class, 'index'])->name('flightsApiIndex');
Route::post('/flights', [FlightController::class, 'store'])->middleware('apiAdmin')->name('flightsApiStore');
Route::get('/flights/{id}', [FlightController::class, 'show'])->name('flightsApiShow');
Route::put('/flights/{id}', [FlightController::class, 'update'])->middleware('apiAdmin')->name('flightsApiUpdate');
Route::delete('/flights/{id}', [FlightController::class, 'destroy'])->middleware('apiAdmin')->name('flightsApiDestroy');

Route::post('/reservations/add', [BookingController::class, 'bookFlight'])->middleware('apiUser');
Route::get('/reservations/view', [BookingController::class, 'viewReservations'])->middleware('apiUser');
Route::delete('/reservations/remove/{id}', [BookingController::class, 'cancelBooking'])->middleware('apiUser');

Route::get('/reservations', [ReservationController::class, 'index'])->middleware('apiAdmin');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

