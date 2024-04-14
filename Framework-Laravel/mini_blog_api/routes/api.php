<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['prefix'=>'notes'], function() {
    Route::get('/get', [NoteController::class, 'index'])->name('notes.get');
    Route::get('/get/note', [NoteController::class, 'getNote'])->name('notes.get.note');
    Route::post('/create', [NoteController::class, 'store'])->name('notes.create'); //Need authors dont use.
    Route::put('/edit', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/delete', [NoteController::class, 'delete'])->name('notes.delete');
});