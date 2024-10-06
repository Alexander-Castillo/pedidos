<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ----------------------------------------------------------------//
# Rutas para los users
Route::prefix('V1')->group(function () {
    # mostrar todos los usuarios
    Route::get('/users', [UsersController::class, 'index']);

    # crear un nuevo usuario
    Route::post('/new_user', [UsersController::class, 'store']);

    # mostrar un usuario por id
    Route::get('/users_by_id/{id}', [UsersController::class, 'show']);

    # auctualizar un usuario
    Route::put('/update_user/{id}', [UsersController::class, 'update']);

    # eliminar un usuario
    Route::delete('/delete_user/{id}', [UsersController::class, 'destroy']);
    // ----------------------------------------------------------------//
    # mostrar todos los pedidos de usuarios
    Route::get('/orders',[OrdersController::class,'index']);

    # crear un nuevo pedido
    Route::post('/new_orders', [OrdersController::class, 'store']);

    # mostrar pedido por id de pedido
    Route::get('/order_by_id/{id}',[OrdersController::class,'show']);

    # actualizar un pedido
    Route::put('/order_update/{id}',[OrdersController::class, 'update']);

    # eliminar un pedido
    Route::delete('/order_delete/{id}',[OrdersController::class, 'destroy']);
});
