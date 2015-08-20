<?php

namespace App\Http\Controllers;

class MainController extends Controller {
    public function getIndex() {
        return view('front.main');
    }
}