<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/show-book/{id}', [PageController::class, 'showBook'])->name('showBook');
Route::patch('/update/book/{id}', [PageController::class, 'updateBook'])->name('updateBook');
Route::get('/delete/book/{id}', [PageController::class, 'deleteBook'])->name('deleteBook');