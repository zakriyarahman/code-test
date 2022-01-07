<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Hashing\HashManager;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param LoginRequest $request
     * @param User $user
     * @param HashManager $hasher
     * @return Response
     */
    public function __invoke(LoginRequest $request, User $user, HashManager $hasher)
    {
        $user = $user->where('email', $request->email)->first();

        // Password Validation
        if (!$user || ! $hasher->check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials doesn\'t match our records.',
            ]);
        }

        return new Response(['token' => $user->createToken($request->device_name)
            ->plainTextToken]);
    }
}
