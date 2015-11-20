<?php
namespace App\Http;
use App\Message;
use Response, Request, Route;
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

Route::get('list', ['middleware' => 'auth', function()
{
    $messages = Message::all();
    return Response::json($messages);
}]);

Route::post('list', ['middleware' => 'auth', function()
{
    $message = Message::find(Request::get('id'));
    $message->note = Request::get('note');
    $message->save();
    return Response::json($message);
}]);

Route::controller('master', 'AdminController');
Route::controller('/', 'MainController');


