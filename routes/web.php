<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


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

Route::get('/', function () {
    return view('welcome');
});
// Route::post('create',[userController::class,'create']);

// Route::post('Store',[userController::class,'store']);
// route::get("mahmoud/{id}",function ()
// {
//   echo "hallo000000"."<br>";
// })->where(['id'=>'[1-9]+']);
// route::post('/store',function()
// {
// echo "store";
// });
// route::view('/mahmoud','create');
route::get('create',[userController::class,'create']);
route::POST('Store',[userController::class,'store']);
route::get('blog',[userController::class,'loadData']);


