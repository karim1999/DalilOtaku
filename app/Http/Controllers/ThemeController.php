<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeController extends Controller
{
    //
    public function switch(){
        if(Cookie::get("theme") == "dark"){
            return back()->cookie(
                'theme', 'light', 512640
            );
        }else{
            return back()->cookie(
                'theme', 'dark', 512640
            );
        }
    }
}
