<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // Importar el controlador
use App\Http\Controllers\TokenController; // Importar el controlador
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//enviar a vista ver productos
Route::get('/lista_produc', [ProductoController::class, 'index']); // Nueva ruta para cargar la vista
//buscar por ide para actulizar
Route::get('/producto/editar/{id}', [ProductoController::class, 'edit'])->name('Producto.edit');
//update 
Route::put('/editar_produc/{id}', [ProductoController::class, 'update'])->name('producto.update');
//buscar por id para eliminar
Route::get('/producto/eliminar/{id}', [ProductoController::class, 'edit'])->name('Producto.edit');
//eliminar
Route::delete('/eliminar_produc/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
//regresar el home
Route::get('/home', function () {
    return view('home');  // Asegúrate de que la vista esté en resources/views/welcome.blade.php
});
//vista de agregar producto
Route::get('/create', function () {
    return view('produc.create');  // Asegúrate de que la vista esté en resources/views/welcome.blade.php
});
//agregar producto
Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
//token
Route::get('/enviar-token', function () {
    return view('produc.enviar-token');
});

Route::post('/enviar-token', [TokenController::class, 'enviarToken'])->name('enviar.token');