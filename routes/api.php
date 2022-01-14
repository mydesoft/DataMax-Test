<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/external-books', [BookController::class, 'searchBooks']);

Route::post('/v1/books', [BookController::class, 'createBook']);

Route::get('/v1/books', [BookController::class, 'allBooks']);

Route::patch('/v1/books/{book}', [BookController::class, 'updateBook']);

Route::delete('/v1/books/{book}', [BookController::class, 'deleteBook']);

Route::get('/v1/books/{book}', [BookController::class, 'showBook']);
