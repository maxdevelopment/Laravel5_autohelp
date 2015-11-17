<?php

namespace App\Http\Controllers;
use Validator, Request, Mail, Log, Config, GeoIP;

class HelpController extends Controller {
    public function postHelp()
    {
        $messages = [
            'name.required' => 'Укажите пожалуйста ваше имя.',
            'phone.required' => 'Укажите пожалуйста ваш номер телефона',
        ];

        $rules = array(
            'name' => 'required',
            'phone' => 'required'
        );

        $validator = Validator::make(Request::all(), $rules, $messages);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            Mail::send('mail.adminmail', ['name' => Request::get('name'), 'phone' => Request::get('phone')], function($message)
            {
                $message->to(Config::get('addconfig.adminmail'))->subject(Config::get('addconfig.subject'));
            });
            $location = GeoIP::getLocation();
            //move to DB
            Log::info('Customer', $location);
        }
    }
}