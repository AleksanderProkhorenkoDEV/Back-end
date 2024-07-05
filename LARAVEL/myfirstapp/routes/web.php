<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UserController; //IMPORTANT

Route::get('/', [UserController::class, 'index'])->name('index');
Route::view('/hello', 'helloWorld')->name('hello');
Route::get('/prueba', [TestingController::class, 'testingPrueba']);
Route::get('/add', [UserController::class, 'create'])->name('crear');

