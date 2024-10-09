<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\pedidosApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


# rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    // ----------------------------------------------------------------//
    # Rutas para los users
    Route::prefix('V1')->group(function () {
        # mostrar un usuario por id
        Route::get('/users_by_id/{id}', [UsersController::class, 'show']);

        # auctualizar un usuario
        Route::put('/update_user/{id}', [UsersController::class, 'update']);

        # eliminar un usuario
        Route::delete('/delete_user/{id}', [UsersController::class, 'destroy']);

        # buscar el usuario que comience con la letra: 
        Route::get('/find_name_like/{name}', [UsersController::class, 'searchByNameLike']);
        // ------------------------------------------------------------------------------//
        # mostrar todos los pedidos de usuarios
        Route::get('/orders', [OrdersController::class, 'index']);

        # crear un nuevo pedido
        Route::post('/new_orders', [OrdersController::class, 'store']);

        # mostrar pedido por id de pedido
        Route::get('/order_by_id/{id}', [OrdersController::class, 'show']);

        # actualizar un pedido
        Route::put('/order_update/{id}', [OrdersController::class, 'update']);

        # eliminar un pedido
        Route::delete('/order_delete/{id}', [OrdersController::class, 'destroy']);

        # mostrar pedidos que esten entre los total_amount 
        Route::get('/orders/range_total_amount/{min}/{max}', [OrdersController::class, 'range_amount']);

        # mostrar pedidos en orden descendiente en base al total_amount
        Route::get('/orders/order_by_total_amount_DESC/', [OrdersController::class, 'order_desc_amount']);

        # mostrar suma total_amount
        Route::get('/orders/sum_total_amount/', [OrdersController::class, 'total_amount']);

        # mostrar cantidad de pedidos por usuarios
        Route::get('/count_orders_by_user/', [OrdersController::class, 'countOrdersByUser']);

        # mostrar el monto total y la cantidad de pedidos totales con la informacion de los usuarios con sus pedidos
        Route::get('/orders/info_orders_users/', [OrdersController::class, 'groupOrdersSumary']);
    });
});
# middleware personalizado para proteger rutas con API-KEY
# ->agregando el authorization sanctum y mi apitoken personalizada
Route::middleware(['auth:sanctum',pedidosApiToken::class])->group(function () {
    Route::prefix('V1')->group(function () {
        # mostrar todos los usuarios
        Route::get('/users', [UsersController::class, 'index']);
    });
});
// ----------------------------------------------------------------//
# Rutas para los users
Route::prefix('V1')->group(function () {
    # crear un nuevo usuario
    Route::post('/new_user', [UsersController::class, 'store']);

    // ------------------------------------------------------------------------------//
    # ruta para login
    Route::post('/login', [LoginController::class, 'login']);
});
