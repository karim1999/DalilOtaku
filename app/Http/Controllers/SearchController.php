<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request){
        $search= $request->input("search");
        $animes= Anime::active()->where(function($q) use($search){
            $q->where("title", "like", "%".$search."%")->orWhere("title_en", "like", "%".$search."%");
        })->paginate(15);
        if($request->input("json"))
            return response()->json($animes);

        $data= [
            "disable_secondary_nav" => true,
            "title" => "بحث عن : " . $search,
            "animes" => $animes,
        ];
        return view('home', $data);
    }
}
