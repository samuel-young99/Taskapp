<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::resource('tasks', TaskController::class);
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::get('/weather/{city}', [WeatherController::class, 'getByCity']);