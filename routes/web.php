<?php

use App\Http\Controllers\BibliotecaViewController;
use Illuminate\Support\Facades\Route;
use Modules\Assuntos\UI\Http\Controllers\AssuntoController;
use Modules\Livros\UI\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("livros", LivroController::class);
Route::resource("assuntos", AssuntoController::class);
Route::get('/exportar', [BibliotecaViewController::class, 'exportarPdf'])->name('exportar');
