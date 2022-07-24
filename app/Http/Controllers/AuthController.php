<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // function register()
    public function register(RegisterRequest $request){
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $token = $user->createToken('authToken')->plainTextToken;

        return $this->apiSuccess([
            'token' => $token,
            'user' => $user,
        ], 'User registered successfully');
    }

    // function login
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if (!$token = auth()->attempt($credentials)) {
            return $this->apiError('Unauthorized', 401);
        }
        return $this->apiSuccess([
            'token' => $token,
            'user' => auth()->user(),
        ], 'User logged in successfully');
    }

}
