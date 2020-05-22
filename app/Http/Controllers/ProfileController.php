<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function favorites(){
        $data= [
            "animes" => auth()->user()->favorites()->paginate(20),
        ];
        return view("profile", $data);
    }
    public function watching(){
        $data= [
            "animes" => auth()->user()->watching()->wherePivot("status", "watching")->paginate(20),
        ];
        return view("profile", $data);
    }
    public function watched(){
        $data= [
            "animes" => auth()->user()->watching()->wherePivot("status", "watched")->paginate(20),
        ];
        return view("profile", $data);
    }
    public function later(){
        $data= [
            "animes" => auth()->user()->watching()->wherePivot("status", "later")->paginate(20),
        ];
        return view("profile", $data);
    }
    public function bookmarked(){
        $data= [
            "animes" => auth()->user()->bookmarks()->paginate(20),
        ];
        return view("profile", $data);
    }
    public function settings(){
        $data= [
        ];
        return view("profile", $data);
    }
}
