<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrimerController;
use App\Http\Controllers\ContactoController;
Route::get('/contacto', [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'send']);
Route::get('/contactado', [ContactoController::class, 'contacted'])->name('contactado');

Route::get('/mi-primer-controller/{texto}', [PrimerController::class, 'mostrarTexto']);
Route::get('/', function () {
    return view('welcomeshop');
});
