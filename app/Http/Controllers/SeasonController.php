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
            "animes" => Anime::where('banned', 0)->whereNotNull("description")->whereHas("season", function($q) use($season){
                $q->where("season", $season);
            })->paginate(15),
        ];
        return view('home', $data);

    }
    public function year($year, $season){
        $season= Season::where(["year" => $year, "season" => $season])->first();
        $data= [
            "title" => $season->season.", ". $season->year,
            "animes" => $season->animes()->where('banned', 0)->whereNotNull("description")->paginate(15),
        ];
        return view('home', $data);

    }

}
