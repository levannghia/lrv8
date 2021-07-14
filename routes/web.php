<?php

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


Route::get('/', 'MyController@index')->name('index');
Route::post('/register', 'MyController@postSignUp');
Route::post('/login', 'MyController@postSignIn');
Route::get('/logout', 'MyController@Logout');

Route::resource('post', PostController::class)->middleware('checklogin');