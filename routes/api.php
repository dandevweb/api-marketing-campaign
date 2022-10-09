<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;

/**Auth Routes */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

/**JWT Token protected Routes */
Route::middleware('auth:api')->group(function () {

    Route::get('campaigns/paginate/{perPage?}', [CampaignController::class, 'paginate']);
    Route::apiResource('campaigns', CampaignController::class);

    Route::get('groups/paginate/{perPage?}', [GroupController::class, 'paginate']);
    Route::apiResource('groups', GroupController::class);

    Route::get('cities/paginate/{perPage?}', [CityController::class, 'paginate']);
    Route::apiResource('cities', CityController::class);

    Route::get('discounts/paginate/{perPage?}', [DiscountController::class, 'paginate']);
    Route::apiResource('discounts', DiscountController::class);

    Route::get('products/paginate/{perPage?}', [ProductController::class, 'paginate']);
    Route::apiResource('products', ProductController::class);
});