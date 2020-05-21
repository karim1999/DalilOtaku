<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class WhoController extends Controller
{
    //
    public function index(){
        $data= [
            "who_title" =>  Setting::getOption("who_title"),
            "who_content" =>  Setting::getOption("who_content"),
        ];
        return view("who", $data);
    }
}
