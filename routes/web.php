<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::prefix('/admin/books')->middleware(['ensure_admin', 'auth'])->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::delete('/destroy/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/edit/{book}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/update/{book}', [BookController::class, 'update'])->name('books.update');

});


require __DIR__ . '/auth.php';
