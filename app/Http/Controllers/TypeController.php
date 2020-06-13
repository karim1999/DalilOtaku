<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Setting;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function show($type, Request $request){
        $animes= Anime::where(["type" => $type])->active()->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);

        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "animes" => $animes,
        ];
        return view('home', $data);

    }

}
