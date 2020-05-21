<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    //
    public function index(){
        $data= [
            "terms_title" =>  Setting::getOption("terms_title"),
            "terms_content" =>  Setting::getOption("terms_content"),
        ];

        return view("terms", $data);
    }
}
