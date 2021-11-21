<?php

namespace App\Services\Routes\Providers\Api;

use App\Http\Controllers\Api\Order\ApiOrderCreateController;
use App\Http\Controllers\Api\Order\ApiOrderDetailController;
use App\Http\Controllers\Api\Order\ApiOrderIndexController;
use App\Http\Controllers\Api\Restaurant\ApiRestaurantDetailController;
use App\Http\Controllers\Api\Restaurant\ApiRestaurantIndexController;
use Illuminate\Support\Facades\Route;

class ApiRoutesProvider
{
    public function registerRoutes()
    {
        Route::group([
            //group conditions
        ],
            function () {
                Route::group([
                    'prefix'=>'/restaurants'
                ],
                    function (){
                        Route::get('/', ApiRestaurantIndexController::class)
                            ->name(ApiRoutes::API_RESTAURANT_INDEX);
                        Route::get('/{id}', ApiRestaurantDetailController::class)
                            ->name(ApiRoutes::API_RESTAURANT_DETAIL);
                    });
                Route::group([
                    'prefix'=>'/orders'
                ],
                    function (){
                        Route::get('/', ApiOrderIndexController::class)
                            ->name(ApiRoutes::API_ORDERS_INDEX);
                        Route::get('/{id}', ApiOrderDetailController::class)
                            ->name(ApiRoutes::API_ORDERS_DETAIL);
                        Route::post('/', ApiOrderCreateController::class)
                            ->name(ApiRoutes::API_ORDERS_CREATE);
                    });

            });

    }
}
