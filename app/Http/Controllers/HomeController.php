<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data= [
            "animes" => Anime::active()->paginate(15),
            "welcome_title" =>  Setting::getOption("welcome_title"),
            "welcome_content" =>  Setting::getOption("welcome_content"),
            "welcome_link" =>  Setting::getOption("welcome_link"),
        ];
        return view('home', $data);
    }
    public function airing()
    {
        $data= [
            "animes" => Anime::active()->where("is_airing", 1)->paginate(15),
        ];
        return view('home', $data);
    }
}
