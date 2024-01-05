<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;

Route::view('/','index')->name('index');
Route::view('/hello', 'helloWorld')->name('hello');
Route::get('/prueba', [TestingController::class, 'testingPrueba']);