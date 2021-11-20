<?php

use App\Models\Dish;
use App\Models\Restaurant;
use App\Services\Menu\Handlers\allMenuHandler;
use App\Services\Menu\MenuService;
use App\Services\Menu\Repositories\MenuRepository;
use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use App\Services\TeleBotService\TestTelebotService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use WeStacks\TeleBot\Laravel\TeleBot;
use WeStacks\TeleBot\Objects\Update;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test',function (){
    dump(Restaurant::all());
    $ret = app(RestaurantsRepositories::class)->getBy(['title'=>'R']);
    dump($ret);
});

Route::get('/', function () {
    return view('welcome');
});
