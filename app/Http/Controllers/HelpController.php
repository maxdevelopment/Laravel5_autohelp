<?php

namespace App\Http\Controllers;
use App\Message;
use Validator, Request, Mail, Log, Config, GeoIP;

class HelpController extends Controller {
    public function postHelp()
    {
        $rules = array(
            'name' => 'required',
            'phone' => 'required'
        );

        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            Log::error('ValidatorError', [$validator->errors()]);
        } else {
            $location = GeoIP::getLocation();
            $location_str = '';
            foreach($location as $key => $value) {
                $location_str .= '[ ';
                $location_str .= $key;
                $location_str .= ' : ';
                $location_str .= $value;
                $location_str .= ' ]&#010;';
            }

            $mailInfo = [
                'name' => Request::get('name'),
                'phone' => Request::get('phone'),
                'location' => $location_str
            ];

            Message::create($mailInfo);

            Mail::send('mail.adminmail', $mailInfo, function($message)
            {
		$message->from(Config::get('addconfig.adminmail'));
                $message->to(Config::get('addconfig.tomail'))->subject(Config::get('addconfig.subject'));
            });
        }
    }
}
