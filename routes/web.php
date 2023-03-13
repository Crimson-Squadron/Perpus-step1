<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add', [AddController::class, 'index'])->name('add');
Route::post('/add', [AddController::class, 'store'])->name('add.store');
Route::get('/{book}/delete', [AddController::class, 'delete']);
Route::get('/tampilkandata/{id}', [AddController::class, 'tampilkandata'])->name('tampilkandata');
Route::put('/update/{id}', [AddController::class, 'update'])->name('update');
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');

Auth::routes();
