<?php

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


Route::post('auth/login', 'Auth\LoginController@authenticate');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('business/response', 'BusinessController@response');
 Route::get('business/access_token', 'BusinessController@access_token');



Route::group(['middleware' => 'auth:web'], function () {

    

});
