<?php

use App\Http\Controllers\Api\Order\ApiOrderCreateController;
use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/test',function (ApiOrderRequest $request){
/*
    $orderRequest = new ApiOrderRequest([
        'user'=>[
            'id'=>'1'
        ],
        'dishes'=>[
            'dish_id'=>'amount'
        ]
    ]);*/
    dd('test');
    dd($this->validate());
    dd($orderRequest->rules());
    dd(collect($orderRequest)->toArray());
/*    $order = \App\Models\Order::factory()->create([
       'user_id'=>1,
       'total' => 100
    ]);
    dd($order->id);
    dd(collect($order)->toArray());*/
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::match(['get','post'],'/home', [HomeController::class,
    'index'])->name('home');
