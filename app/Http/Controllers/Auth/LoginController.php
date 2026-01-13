<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request) : Response
    {
        $data = $request->validated();

        Log::info('Attempting login with credentials: ', ['credentials' => $data]);

        if (!Auth::attempt($data)) {
            Log::info('Login attempt unsuccessful with credentials: ', ['credentials' => $data]);

            return response()->json([
                'message' => 'error',
            ], Response::HTTP_UNAUTHORIZED);
        }

        Log::info('Logging in with credentials: ', ['credentials' => $data]);

        $token = Auth::user()->createToken('login-token')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'token' => $token,
        ], Response::HTTP_OK);
    }
}
