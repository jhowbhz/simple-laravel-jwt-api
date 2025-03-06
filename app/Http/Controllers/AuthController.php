<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register() {

        $validator = Validator::make(request()->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        return response()->json($user, 201);
    }

    public function login() {

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $credentials = request(['email', 'password']);

        $token = Auth::attempt($credentials);

        if(!$token){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }

    public function me()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    protected function respondWithToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }
}
