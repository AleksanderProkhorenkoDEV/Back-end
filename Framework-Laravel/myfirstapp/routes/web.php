<?php

use Illuminate\Support\Facades\Route;

Route::view('/','index')->name('index');
Route::view('/hello', 'helloWorld')->name('hello');