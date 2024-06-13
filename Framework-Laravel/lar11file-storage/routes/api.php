<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::apiResource('image', ImageController::class);
