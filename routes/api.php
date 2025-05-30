<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function (Request $request) {
    return json_encode(['message' => 'ok']);
});

Route::get('/livro', function () {
    return json_encode(['message' => 'ok']);
});
