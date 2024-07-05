<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

Route::get('/', [NotesController::class, 'show'])->name('index');
Route::get('/select/{note}', [NotesController::class, 'select'])->name('select');

Route::get('/create', [NotesController::class, 'create'])->name('create');
Route::post('/create/storage', [NotesController::class, 'storage'])->name('storage');

Route::get('/edit/{note}', [NotesController::class, 'edit'])->name('edit');
Route::put('/upadte/{note}', [NotesController::class , 'update'])->name('update');

Route::delete('/delete/{note}', [NotesController::class, 'delete'])->name('delete');




