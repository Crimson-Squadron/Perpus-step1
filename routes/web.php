<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function() {
//     return view('welcome');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add', [AddController::class, 'index'])->name('add');
Route::post('/add', [AddController::class, 'store'])->name('add.store');
Route::get('/{book}/delete', [AddController::class, 'delete']);
Route::get('/edit/{id}', [AddController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [AddController::class, 'update'])->name('update');
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/buku/search', [AddController::class, 'search'])->name('add.search');

Auth::routes();
