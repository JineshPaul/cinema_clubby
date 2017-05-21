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
Route::post('auth/register', 'Auth\RegisterController@register');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('business/access_token', 'BusinessController@access_token');
Route::get('registration_confirm_mail', 'UserController@registration_confirm_mail');
Route::get('verify/{code}', array('as' => 'user.email.confirm', 'uses' => 'UserController@email_confirm'));
Route::get('verified_email/{status}', array('as' => 'user.confirmed', 'uses' => 'UserController@verified_email'));


Route::group(['middleware' => 'auth:web'], function () {

    

});
