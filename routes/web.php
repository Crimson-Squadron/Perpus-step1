<?php

use App\Http\Controllers\AddController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add', [AddController::class, 'index'])->name('add');
Route::post('/add', [AddController::class, 'store'])->name('add.store');
Route::get('/{book}/delete', [AddController::class, 'delete']);
// Route::get('/{book}/edit', [AddController::class, 'edit']);

Auth::routes();
