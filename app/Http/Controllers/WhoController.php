<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class WhoController extends Controller
{
    //
    public function index(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
        ];
        return view("who", $data);
    }
}
