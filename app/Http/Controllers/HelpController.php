<?php
/**
 * Created by PhpStorm.
 * User: raw
 * Date: 05.09.15
 * Time: 1:20
 */

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


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
        }
    }
}