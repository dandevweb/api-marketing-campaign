<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GroupController;

/**Auth Routes */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

/**Protected Routes */
Route::middleware('auth:api')->group(function () {

    Route::get('campaigns/paginate/{perPage?}', [CampaignController::class, 'paginate']);
    Route::apiResource('campaigns', CampaignController::class);

    Route::get('groups/paginate/{perPage?}', [GroupController::class, 'paginate']);
    Route::apiResource('groups', GroupController::class);

    Route::get('cities/paginate/{perPage?}', [CityController::class, 'paginate']);
    Route::apiResource('cities', CityController::class);
});