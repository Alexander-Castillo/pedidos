<?php

namespace App\Http\Controllers;

use App\Models\User;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        //verifica si se cumplen o no las validaciones
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }
        $email = $request->input('email');
        $password = $request->input('password');
        # validar que email y password existan en la base de datos
        $user = User::where('email', $email)->where('password', $password)->first();
        if ($user) {
            $token = $user->createToken('api_token')->plainTextToken;
            return response()->json([
                'user' => $email,
                'token' => $token
            ], 200);
        }
        return response()->json(['message' => 'Invalid email or password, you are not Authotize'], 401);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
