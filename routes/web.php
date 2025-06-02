<?php

use App\Http\Controllers\BibliotecaViewController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("livros", LivroController::class);
Route::get('/exportar', [BibliotecaViewController::class, 'exportarPdf'])->name('exportar');
