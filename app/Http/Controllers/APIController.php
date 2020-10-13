<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function login(Request $request) {
        $input = $request->only('email', 'password');

        $token = null;

        if(!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }

        return response()->json([
            'status' => true,
            'token' => $token
        ]);
    }

    public function logout(Request $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);
        
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'status' => true,
                'message' => "User log out successfully"
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => "Sorry, the user cannot be logged out"
            ], 500);
        }

    }
}
