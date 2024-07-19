<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::post('create', [UserController::class, 'create'])->name('create.user');
