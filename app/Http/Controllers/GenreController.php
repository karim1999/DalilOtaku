<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Genre;
use App\Setting;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function show($genre_id, Request $request){
        $genre= Genre::findOrFail($genre_id);
        $animes= $genre->animes()->active()->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);

        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "title" => $genre->name_en,
            "animes" => $animes,
        ];
        return view('home', $data);

    }
}
