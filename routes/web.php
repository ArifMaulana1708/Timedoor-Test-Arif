<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index']);


Route::resource('/book', BookController::class);
Route::resource('/author', AuthorController::class);
Route::resource('/rating', RatingController::class);