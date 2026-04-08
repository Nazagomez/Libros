<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::get('/diagram', function () {
    return view('diagram');
})->name('diagram');

Route::resource('books', BookController::class)->except(['destroy']);
Route::resource('authors', AuthorController::class)->except(['destroy']);
Route::resource('publishers', PublisherController::class)->except(['destroy']);
