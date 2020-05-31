<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request){
        $search= $request->input("search");
        $data= [
            "disable_secondary_nav" => true,
            "title" => "بحث عن : " . $search,
            "animes" => Anime::active()->where(function($q) use($search){
                $q->where("title", "like", "%".$search."%")->orWhere("title_en", "like", "%".$search."%");
            })->get(),
        ];
        return view('home', $data);
    }
}
