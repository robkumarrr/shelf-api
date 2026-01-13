<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegistrationRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(CreateRegistrationRequest $request) {
        $newCredentials = $request->validated();

        $user = User::query()->create($newCredentials);

        $token = $user->createToken('login-token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully.',
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
