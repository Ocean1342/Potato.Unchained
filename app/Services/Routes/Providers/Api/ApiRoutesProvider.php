<?php

namespace App\Services\Routes\Providers\Api;

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
                    'prefix'=>'/restaurant'
                ],
                    function (){
                        Route::get('/', ApiRestaurantIndexController::class)
                            ->name(ApiRoutes::API_RESTAURANT_INDEX);
                        Route::get('/{id}', ApiRestaurantDetailController::class)
                            ->name(ApiRoutes::API_RESTAURANT_DETAIL);
                    });

            });

    }
}
