<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255|regex:/^([a-z0-9+_]+)(\.[a-z0-9+_-]+)*@[a-z0-9]([a-z0-9-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8|max:32',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('api')->attempt($credentials);

        if (empty($token)) {
            return response()->json(['error' => 'Email or password is incorrect!'], 401);
        }

        return $this->createNewToken($token);
    }

    public function createNewToken($token){
        return response()->json([
            'access_token' => 'Bearer ' . $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            'user' => Auth::guard('api')->user()
        ]);
    }

    public function getUserProfile()
    {
        return response()->json(Auth::guard('api')->user());
    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'User logout successfully!']);
    }
}
