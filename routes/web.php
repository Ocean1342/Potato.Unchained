<?php

use App\Http\Controllers\Api\Order\ApiOrderCreateController;
use App\Http\Controllers\HomeController;
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
Route::get('/test',ApiOrderCreateController::class);

/*Route::get('/test',function (){
    $ar = GeoPoints::sortByClosest(60.007116,30.2922932); //spb
    echo GeoPoints::prettyPrint($ar);
});*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::match(['get','post'],'/home', [HomeController::class,
    'index'])->name('home');
