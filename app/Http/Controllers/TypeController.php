<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function show($type, Request $request){
        $animes= Anime::where(['banned'=> 0, "type" => $type])->whereNotNull("description")->paginate(15)->appends($request->query());
        if($request->input("json"))
            return response()->json($animes);

        $data= [
            "animes" => $animes,
        ];
        return view('home', $data);

    }

}
