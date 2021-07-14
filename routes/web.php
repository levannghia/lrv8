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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'MyController@index')->name('index');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::post('/register', 'MyController@postSignUp');
Route::post('/login', 'MyController@postSignIn');
Route::get('/logout', 'MyController@Logout');