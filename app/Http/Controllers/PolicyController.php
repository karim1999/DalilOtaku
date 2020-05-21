<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
    public function index(){
        $data= [
            "policy_title" =>  Setting::getOption("policy_title"),
            "policy_content" =>  Setting::getOption("policy_content"),
        ];
        return view("policy", $data);
    }
}
