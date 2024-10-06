<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar todas las orders
        # sql query = select orders.id, orders.product, orders.quantity, orders.total_amount, users.name from orders inner join users on orders.user_id = users.id;
        $orders = Orders::join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.id', 'orders.product', 'orders.quantity', 'orders.total_amount', 'users.name')
            ->get();
        # condicionamos si hay o no datos
        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No hay datos en la base de datos'], 404);
        }
        return response()->json($orders, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # validacion de los datos de entrada del request
        $validator = Validator::make($request->all(),[
            'product' => 'required|string|max:60',
            'quantity' => 'required|int',
            'total_amount' => ['required', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
            'user_id' =>'required|int'
        ]);
        //verificamos que se cumplan las validaciones
        if($validator->fails()){
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $validator->errors()
            ],400);
        }
        //metodo para agregar un nuevo pedido
        $orders = new Orders();
        $orders->product = $request->input('product');
        $orders->quantity = $request->input('quantity');
        $orders->total_amount = $request->input('total_amount');
        $orders->user_id = $request->input('user_id');
        $orders->save();
        //mensaje de exito si se logra guardar
        return response()->json(['message' => 'Pedido guardado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Mostrar pedidos por id de pedido
    $order = Orders::join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.id', 'orders.product', 'orders.quantity', 'orders.total_amount', 'users.name')
        ->where('orders.id', $id)
        ->get();
    
    if ($order->isEmpty()) {
        // Si no encuentra el pedido, retornar mensaje de no encontrado
        return response()->json(['message' => 'Pedido no encontrado'], 404);
    }
    
    // Si se encuentra, retornar el pedido
    return response()->json($order, 200);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //buscar el registro para actualizar
        $order = Orders::find($id);
        if(!$order){
            # no encontrado message 400
            return response()->json(['message' => 'Pedido no encontrado con ese id'], 404);
        }
        // validacion de los datos de entrada del request
        $validator = Validator::make($request->all(),[
            'product' => 'sometimes|required|string|max:60',
            'quantity' => 'sometimes|required|int',
            'total_amount' => ['sometimes','required', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
            'user_id' =>'sometimes|required|int'
        ]);
        //verificamos que se cumplan las validaciones
        if($validator->fails()){
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $validator->errors()
            ],400);
        }
        # actualizar datos solo si estan presente en el request
        if($request->has('product')){
            $order->product = $request->input('product');
        }
        if($request->has('quantity')){
            $order->quantity = $request->input('quantity');
        }
        if($request->has('total_amount')){
            $order->total_amount = $request->input('total_amount');
        }
        if($request->has('user_id')){
            $order->user_id = $request->input('user_id');
        }
        # guardar los cambios si los hay
        $order->save();
        //mensaje de exito si se logra guardar
        return response()->json(['message' => 'Pedido actualizado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //eliminamos un pedido
        $order = Orders::find($id);
        if(!$order){
            return response()->json(['error'=>'No se encontro ningun pedido con ese ID'],400);
        }
        $order->delete();
        //mensaje de exito si se logra eliminar
        return response()->json(['message' => 'Pedido eliminado correctamente'], 200);
    }
}
