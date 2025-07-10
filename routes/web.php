<?php

use App\Http\Controllers\BibliotecaViewController;
use Illuminate\Support\Facades\Route;
use Modules\Livros\UI\Http\Controllers\LivroController;

Route::resource("livros", LivroController::class);
Route::get('/exportar', [BibliotecaViewController::class, 'exportarPdf'])->name('exportar');
