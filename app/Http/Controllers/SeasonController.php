<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    //
    public function show($season){
        $data= [
            "animes" => Anime::where(['season' => $season])->active()->paginate(15),
        ];
        return view('home', $data);

    }
    public function year($year, $season){
//        $season= Season::where(["year" => $year, "season" => $season])->first();
        $data= [
            "title" => $season->season.", ". $season->year,
            "animes" => Anime::where(['season' => $season, 'year' => $year])->active()->paginate(15),
        ];
        return view('home', $data);

    }

}
