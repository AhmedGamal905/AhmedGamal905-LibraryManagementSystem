<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', HomeController::class)->middleware('auth')->name('home');

Route::prefix('/admin')->name('admin.')->middleware(['ensure_admin', 'auth'])->group(function () {
    Route::resource('/books', BookController::class)->except('show');
});

require __DIR__.'/auth.php';
