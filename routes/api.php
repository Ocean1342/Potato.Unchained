<?php

use App\Services\Routes\Providers\Api\ApiRoutesProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
app(ApiRoutesProvider::class)->registerRoutes();

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
