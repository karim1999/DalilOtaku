<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function show($genre_id){
        $genre= Genre::findOrFail($genre_id);
        $data= [
            "title" => $genre->name_en,
            "animes" => $genre->animes()->where('banned', 0)->whereNotNull("description")->paginate(30),
        ];
        return view('home', $data);

    }
}
