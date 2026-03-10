<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\pagosController;

Route::get('/', function () {
    return view('welcome');
});

//muestra los datos, en caso de volver de envio de datos tambien los rellena
Route::get('/calcular-iva',[pagosController::class,'index'])->name('form.iva');
Route::post('/calcular-iva',[pagosController::class,'calcularConIva'])->name('calcularconiva');

Route::get('/pagos',[pagosController::class, 'verPagos'])->name('pagos');
