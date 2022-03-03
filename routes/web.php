<?php
use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\studentController;

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







Route::middleware(['checkLogin'])->group(function(){

# Student Routes .......
Route::get('Student/',[studentController::class,'index']);
Route::get('Student/Create',[studentController::class,'create']);
Route::post('Student/Store',[studentController::class,'Store']);
Route::get('Student/edit/{id}',[studentController::class,'edit']);
Route::put('Student/update/{id}',[studentController::class,'update']);
Route::get("Student/LogOut",[studentController::class,'LogOut']);

Route::resource('task',taskController::class);

});

Route::get("Student/Login",[studentController::class,'login']);
Route::post("Student/doLogin",[studentController::class,'doLogin']);
