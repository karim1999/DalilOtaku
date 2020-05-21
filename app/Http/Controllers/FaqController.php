<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index(){
        $data= [
            "questions"=> Question::all()->toArray()
        ];
        return view("faq", $data);
    }
}
