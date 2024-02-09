<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RentController;

Route::view('/', 'index')->name('home.index');
/*
    -----------------------------------
        ROUTES FOR USERS
    -----------------------------------
*/
Route::view('/users', 'users')->name('users');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/insert', [UserController::class, 'insert'])->name('user.insert');
/*
    -----------------------------------
        ROUTES FOR AUTHORS
    -----------------------------------
*/
Route::view('/authors', 'authors')->name('authors');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/insert', [AuthorController::class, 'insert'])->name('author.insert');
/*
    -----------------------------------
        ROUTES FOR BOOKS
    -----------------------------------
*/
Route::view('/books', 'books')->name('books');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/insert', [BookController::class, 'insert'])->name('book.insert');
/*
    -----------------------------------
        ROUTES FOR RENTS
    -----------------------------------
*/
Route::view('/rents', 'rents')->name('rents');
Route::get('/rents/create', [RentController::class, 'create'])->name('rent.create');
Route::post('/rents/insert', [RentController::class, 'insert'])->name('rent.insert');
