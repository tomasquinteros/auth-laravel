<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;

class AuthService implements AuthServiceInterface
{
    public function __construct()
    {
    }

    public function login(AuthRequest $request)
    {
        // TODO: Implement login() method.
    }

    public function logout(Request $request)
    {
        // TODO: Implement logout() method.
    }

    public function logoutAll(Request $request)
    {
        // TODO: Implement logoutAll() method.
    }

    public function validateToken(Request $request)
    {
        // TODO: Implement validateToken() method.
    }

    public function refreshToken(Request $request)
    {
        // TODO: Implement refreshToken() method.
    }

    public function createToken()
    {
        // TODO: Implement createToken() method.
    }

    public function registration(UserRequest $request)
    {
        // TODO: Implement registrate() method.
    }
}
