<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function show($type){
        $data= [
            "animes" => Anime::where(['banned'=> 0, "type" => $type])->whereNotNull("description")->paginate(15),
        ];
        return view('home', $data);

    }

}
