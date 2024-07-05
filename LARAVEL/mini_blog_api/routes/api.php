<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['prefix'=>'notes'], function() {
    Route::get('/get', [NoteController::class, 'index'])->name('notes.get');
    Route::get('/get/note', [NoteController::class, 'getNote'])->name('notes.get.note');
    Route::post('/create', [NoteController::class, 'store'])->name('notes.create'); 
    Route::put('/edit', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/delete', [NoteController::class, 'delete'])->name('notes.delete');
});

Route::group(['prefix' => 'authors'], function() {
    Route::get('/get', [AuthorController::class, 'index'])->name('authors.get');
    Route::get('/get/author', [AuthorController::class, 'getAuthor'])->name('authors.get.author');
    Route::post('/create', [AuthorController::class, 'store'])->name('authors.create');
    Route::put('/edit', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/delete', [AuthorController::class, 'delete'])->name('authors.delete');
});