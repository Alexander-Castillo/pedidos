<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar todos los users de la base de datos en un json utlizando modelo ORM
        # sql = "SELECT * FROM users";
        $user = User::all();
        if (count($user) > 0) {
            # mandar todos los registros de users con status 200
            return response()->json($user, 200);
        }
        # si no hay users, mandar status 400 con un mensaje de error
        return response()->json(['error' => 'No se encontraron usuarios'], 400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada del request con la libreria VALIDATOR
        $validator= Validator::make($request->all(),[
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:90|unique:users',
            'phone_number' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8'
        ]);
        //verifica si se cumplen o no las validaciones
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }
        // Si la validación pasa, crear el usuario
        //registrar un usuario
        // sql= "INSERT INTO users VALUES ('name', 'email','phone_number', 'password')";
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = bcrypt($request->input('password')); // Encriptar la contraseña
        $user->save();

        // Responder con un mensaje de éxito y el código 201
        return response()->json(['message' => 'Successfully registered'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mostrar usuarios por id
        // sql = "SELECT * FROM users WHERE id = $id";
        $user = User::find($id);
        if ($user != null) {
            # mandar los datos del usuario con status 200
            return response()->json($user, 200);
        }
        # si no hay user con el id, mandar status 400 con un mensaje de error
        return response()->json(['error' => 'No se encontró un usuario con ese ID'], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //buscar el usuario para actualizar por el id
        $user = User::find($id);
        if(!$user){
            return response()->json(['error' => 'No se encontró un usuario con ese ID'], 400);
        }
        #validamos los campos
        $validator= Validator::make($request->all(),[
            'name' => 'sometimes|required|string|max:50',
            'email' => 'sometimes|required|string|email|max:90|unique:users,email,'.$user->id,
            'phone_number' => 'sometimes|required|string|max:15|unique:users,phone_number,'.$user->id,
            'password' => 'sometimes|required|string|min:8'
        ]);
        //verifica si se cumplen o no las validaciones
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }
        // Actualizamos los campos solo si estan presente en el $request
        if($request->has('name')){
            $user->name = $request->input('name');
        }
        if($request->has('email')){
            $user->email = $request->input('email');
        }
        if($request->has('phone_number')){
            $user->phone_number = $request->input('phone_number');
        }
        if($request->has('password')){
            $user->password = bcrypt($request->input('password')); // Encriptar la contraseña
        }
        // Guardamos los cambios en la base de datos
        $user->save();
        // Responder con un mensaje de éxito y el código 200
        return response()->json(['message' => 'Successfully updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //funcion eliminar usuario
        $user = User::find($id);
        if(!$user){
            return response()->json(['error' => 'No se encontró un usuario con ese ID'], 400);
        }
        // Eliminamos el usuario
        $user->delete();
        // Responder con un mensaje de éxito y el código 200
        return response()->json(['message' => 'Successfully deleted'], 200);
    }
    /**
     * buscar users cuyo nombre comience con una letra dada
     */
    public function searchByNameLike(string $name){
        //sql = "SELECT * FROM users WHERE name LIKE '$name%'";
        $users = User::where('name', 'LIKE', '%'.$name.'%')->get();
        if (count($users) > 0) {
            # mandar todos los resultados con status 200
            return response()->json($users, 200);
        }
        # si no hay users, mandar status 400 con un mensaje de error
        return response()->json(['error' => 'No se encontraron usuarios con ese nombre'], 400);
    }
    
}
