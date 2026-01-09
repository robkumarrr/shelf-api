<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(CreateRegistrationRequest $request) {
        $newCredentials = $request->validated();

        $user = User::query()->create($newCredentials);
    }
}
