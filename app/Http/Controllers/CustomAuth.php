<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CustomAuth extends Controller {
    public function postLogin()
    {
        $rules = array(
            'login' => 'required|min:3|alpha_dash',
            'password' => 'required|min:6|alpha_dash'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        if(Auth::attempt(['login' => Input::get('login'), 'password' => Input::get('password'), 'isAdmin' => 1, 'isActive' => 1])){
            return redirect('master');
        } else {
            return redirect()->route('login')->with('message', 'Login/Password Failed');
        }
    }
}