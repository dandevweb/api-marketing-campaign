<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\LoginInvalidException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function register(array $inputs): User
    {
        return User::create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password'])
        ]);
    }

    public function login(array $inputs): array
    {
        $login = [
            'email' => $inputs['email'],
            'password' => $inputs['password']
        ];

        if (!$token = Auth::guard('api')->attempt($login)) {
            throw new LoginInvalidException();
        }

        return [
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ];
    }


}