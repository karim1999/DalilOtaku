<?php

namespace App\Http\Controllers;

use App\Question;
use App\Setting;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "questions"=> Question::all()->toArray()
        ];
        return view("faq", $data);
    }
}
