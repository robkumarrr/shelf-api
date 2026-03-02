<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegistrationRequest;
use App\Http\Resources\Auth\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function store(CreateRegistrationRequest $request): JsonResponse {
        $newCredentials = $request->validated();

        $user = User::query()->create($newCredentials);

        Auth::login($user);

        return (new UserResource($user))
            ->additional(['message' => 'User registered successfully.'])
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
