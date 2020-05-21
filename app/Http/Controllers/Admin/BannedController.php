<?php

namespace App\Http\Controllers\Admin;

use App\Anime;
use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannedController extends Controller
{
    //
    public function animes(){
        $data= [
            'animes' => Anime::where('banned', '1')->paginate(10),
            'banned_animes' => Anime::where('banned', '1')->count(),
            'banned_genres' => Genre::where('banned', '1')->count(),
        ];
        return view("admin.banned.animes", $data);
    }

    public function genres(){
        $data= [
            'genres' => Genre::where('banned', '1')->paginate(10),
            'banned_animes' => Anime::where('banned', '1')->count(),
            'banned_genres' => Genre::where('banned', '1')->count(),
        ];
        return view("admin.banned.genres", $data);
    }
}
