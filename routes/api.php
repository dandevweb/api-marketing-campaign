<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CampaignController;

/**Auth Routes */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

/**Protected Routes */
Route::middleware('auth:api')->group(function () {

    Route::get('campaigns/paginate/{perPage?}', [CampaignController::class, 'paginate']);
    Route::apiResource('campaigns', CampaignController::class);
});