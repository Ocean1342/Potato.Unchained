<?php

use App\Models\Dish;
use App\Services\Menu\Handlers\allMenuHandler;
use App\Services\Menu\MenuService;
use App\Services\Menu\Repositories\MenuRepository;
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

Route::get('/tg',function (){
//    dump(app(TestTelebotService::class)->handle());
//    $var = app(TestTelebotService::class);
//    $var = new TestTelebotService(,new Update());
    //    TeleBot::sendMessage(['chat_id'=>123,'text'=>'privet']);

    TeleBot::addHandler(TestTelebotService::class);
    $var = TeleBot::getUpdates();
        //    TeleBot::getMe();
    dump($var);
//    dump($var->handle());
});

Route::get('/', function () {
//    Log::channel('telegram')->debug('hello!');
    return view('welcome');
});
