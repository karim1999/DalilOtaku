<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    //
    public function show($season, Request $request){
        $animes= Anime::where(['season' => $season, 'year'=> date('Y')])->active()->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);
        $data= [
            "animes" => $animes,
        ];
        return view('home', $data);

    }
    public function year($year, $season, Request $request){
//        $season= Season::where(["year" => $year, "season" => $season])->first();
        $animes= Anime::where(['season' => $season, 'year' => $year])->active()->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);
        $data= [
            "title" => $season.", ". $year,
            "animes" => $animes,
        ];
        return view('home', $data);

    }

}
