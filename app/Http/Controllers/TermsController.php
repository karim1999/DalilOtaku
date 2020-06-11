<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    //
    public function index(){
        $settings= Setting::all()->keyBy("key");
        $data= [
            "settings"=> $settings,
            "terms_title" =>  $settings["terms_title"]->value,
            "terms_content" =>  $settings["terms_content"]->value,
        ];

        return view("terms", $data);
    }
}
