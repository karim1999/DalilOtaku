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
    public function index(Request $request)
    {
//        $current_year= date('Y');
        $current_season= $this->get_season_by_day(date("z"));
        $animes= Anime::active()->where(["season" => $current_season, "year" => date("Y")])->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);

        $data= [
            "current_season" => $current_season,
            "animes" => $animes,
            "settings"=> Setting::all()->keyBy("key"),
        ];
        return view('home', $data);
    }
    public function all(Request $request)
    {
        $animes= Anime::active()->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);

        $data= [
            "animes" => $animes,
            "settings"=> Setting::all()->keyBy("key"),
        ];
        return view('home', $data);
    }
    public function later(Request $request){
        $animes= Anime::active()->where(["releasing" => 0])->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);
        $data= [
            "animes" => $animes,
            "disable_secondary_nav" => true,

        ];
        return view('home', $data);
    }
    public function airing(Request $request)
    {
        $animes= Anime::active()->where("releasing", 1)->whereNotNull("airing_at")->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);

        $data= [
            "animes" => $animes,
        ];
        return view('home', $data);
    }
    function get_season_by_day($day) {

        //  Days of spring
        $spring_starts = date("z", strtotime("March 21"));
        $spring_ends   = date("z", strtotime("June 20"));

        //  Days of summer
        $summer_starts = date("z", strtotime("June 21"));
        $summer_ends   = date("z", strtotime("September 22"));

        //  Days of autumn
        $autumn_starts = date("z", strtotime("September 23"));
        $autumn_ends   = date("z", strtotime("December 20"));


        //  If $day is between the days of spring, summer, autumn, and winter
        if( $day >= $spring_starts && $day <= $spring_ends ) {
            $season = "spring";
        }else if( $day >= $summer_starts && $day <= $summer_ends ) {
            $season = "summer";
        }elseif( $day >= $autumn_starts && $day <= $autumn_ends ) {
            $season = "autumn";
        }else {
            $season = "winter";
        }

        return $season;
    }

}
