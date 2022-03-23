<?php

namespace App\Services\Routes\Providers\Api;

use App\Http\Controllers\Api\Order\ApiOrderCreateController;
use App\Http\Controllers\Api\Order\ApiOrderDetailController;
use App\Http\Controllers\Api\Order\ApiOrderIndexController;
use App\Http\Controllers\Api\Restaurant\ApiRestaurantDetailController;
use App\Http\Controllers\Api\Restaurant\ApiRestaurantIndexController;
use Illuminate\Support\Facades\Route;

/**
 * Group of Api Routes
 */
class ApiRoutesProvider
{
    /**
     * @return void
     */
    public function registerRoutes()
    {
        Route::group([

            'middleware' => 'auth_api:sanctum'
        ],
            function () {
                Route::group([
                    'prefix' => '/restaurants'
                ],
                    function () {
                        Route::get('/', ApiRestaurantIndexController::class)
                            ->name(ApiRoutes::API_RESTAURANT_INDEX);
                        Route::get('/{id}', ApiRestaurantDetailController::class)
                            ->name(ApiRoutes::API_RESTAURANT_DETAIL)
                            ->where('id', '\d+');
                    });
                Route::group([
                    'prefix' => '/orders'
                ],
                    function () {
                        Route::get('/', ApiOrderIndexController::class)
                            ->name(ApiRoutes::API_ORDERS_INDEX);
                        Route::get('/{id}', ApiOrderDetailController::class)
                            ->name(ApiRoutes::API_ORDERS_DETAIL)
                            ->where('id', '\d+');
                        Route::post('/', ApiOrderCreateController::class)
                            ->name(ApiRoutes::API_ORDERS_CREATE);
                    });

            });

    }
}
