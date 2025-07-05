<?php

namespace App\Interfaces;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function registration (UserRequest $request);
    public function login(AuthRequest $request);

    public function logout(Request $request);

    public function logoutAll(Request $request);
    public function validateToken (Request $request);

    public function refreshToken (Request $request);

    public function createToken ();

}
