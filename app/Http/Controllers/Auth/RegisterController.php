<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(CreateRegistrationRequest $request) {
        $newCredentials = $request->validated();

        $user = User::query()->create($newCredentials);

        Auth::login($user);

        return response()->json([
            'message' => 'User registered successfully.',
            'user' => $user
        ], 201);
    }
}
