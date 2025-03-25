<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//importar  el controlador
use App\Http\Controllers\ProductoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
/*obtener */
Route::get('/producto',[ProductoController::class,'index']);
/*obtener or id*/
Route::get('/producto/{id}',[ProductoController::class,'show']);
/*enviar  */
Route::post('/producto', [ProductoController::class, 'store']);
/*actulizar */
Route::put('/producto/{id}',[ProductoController::class, 'update']);
/*eliminar */
Route::delete('/producto/{id}',[ProductoController::class, 'destroy']);