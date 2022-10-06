<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function register(AuthRegisterRequest $authRegisterRequest): UserResource
    {
        $inputs = $authRegisterRequest->validated();

        return new UserResource($this->authService->register($inputs));
    }

    public function login(AuthLoginRequest $authLoginRequest): UserResource
    {
        $inputs = $authLoginRequest->validated();
        $token = $this->authService->login($inputs);

        return (new UserResource(Auth::guard('api')->user()))->additional($token);
    }

}