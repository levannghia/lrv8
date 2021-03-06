<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;


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

Route::middleware('auth:api')->group(function () {
    //return $request->user();
    Route::get('users/getme',[AuthController::class,'getMe']);
    Route::resource('posts', apiPostController::class);
});

Route::post('users/register', [AuthController::class, 'Register']);
Route::post('users/login', [AuthController::class, 'Login']);


