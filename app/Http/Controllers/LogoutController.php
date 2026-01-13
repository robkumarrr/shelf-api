<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        if (!$user->currentAccessToken()->delete()) {
            throw new \Exception('Could not log the user out.');
        }

        return response()->json([
            'status' => 'success',
            'message' => "API access token deleted for user {$user->id}"
        ], Response::HTTP_OK);
    }
}
