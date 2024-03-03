<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/error', function () {
    return view('errors.generic');
});
// Routes for ADMINS
Route::post('/store', [BooksController::class, 'store'])->middleware('auth')->name('books.store');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

require __DIR__ . '/auth.php';
