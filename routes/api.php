<?php

use App\Models\Airplane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

