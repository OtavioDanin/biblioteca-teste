<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livro', function () {
    return json_encode(['message' => 'ok']);
});
