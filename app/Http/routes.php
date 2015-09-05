<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('help', 'HelpController@postHelp');
Route::post('auth', 'CustomAuth@postLogin');

Route::get('auth/login', [
    'as' => 'login', 'uses' => 'Auth\AuthController@getLogin'
]);

Route::get('auth/logout', [
    'as' => 'logout', 'uses' => 'Auth\AuthController@getLogout'
]);

Route::controller('master', 'AdminController');
Route::controller('/', 'MainController');


