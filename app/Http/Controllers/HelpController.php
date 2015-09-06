<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;


class HelpController extends Controller {
    public function postHelp()
    {
        $rules = array(
            'name' => 'required',
            'phone' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            Mail::send('mail.adminmail', ['name' => Input::get('name'), 'phone' => Input::get('phone')], function($message)
            {
                $message->to(Config::get('addconfig.adminmail'))->subject(Config::get('addconfig.subject'));
            });
        }
    }
}