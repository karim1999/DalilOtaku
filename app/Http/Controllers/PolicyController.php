<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
    public function index(){
        $settings= Setting::all()->keyBy("key");
        $data= [
            "settings"=> $settings,
            "policy_title" =>  $settings["policy_title"]->value,
            "policy_content" =>  $settings["policy_content"]->value,
        ];
        return view("policy", $data);
    }
}
