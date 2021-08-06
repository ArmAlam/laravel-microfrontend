<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (\Auth::attempt($request->only('email', 'password'))) {
            $user = \Auth::user();
            $token = $user->createToken('admin')->accessToken;

            return [
                'token' => $token
            ];
        }

        return response([
            'error' => 'Invalid credentials'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
