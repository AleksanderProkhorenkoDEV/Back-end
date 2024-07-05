<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/note', [NoteController::class, 'getAll'])->name('note');
Route::post('/note/create', [NoteController::class, 'insertNote'])->name('note.create');
Route::get('/note/pdf', [NoteController::class, 'downloadPDF'])->name('note.pdf');
    