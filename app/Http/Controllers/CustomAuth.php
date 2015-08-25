<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class CustomAuth extends Controller {
    public function postLogin()
    {
        $login  = Request::input('login');
        $password   = Request::input('password');

        if(Auth::attempt(['login' => $login, 'password' => $password, 'isAdmin' => 1, 'isActive' => 1])){
            return "Hello World";
        } else {
            return "Hello Hell";
        }
    }
}