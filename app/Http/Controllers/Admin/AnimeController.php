<?php

namespace App\Http\Controllers\Admin;

use App\Anime;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Season;
use App\Studio;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    //
    public function index(){
        $data= [];
        return view("admin.animes.view", $data);
    }

    public function addStudio($studios, $anime_id){
        foreach ($studios as $studio){
            $current_studio= Studio::firstOrCreate(['id'=> $studio['mal_id']], ["name_en"=> $studio["name"]]);
            $current_studio->animes()->syncWithoutDetaching($anime_id);
        }
    }
//    public function addGenres($genres, $anime_id){
//        foreach ($genres as $genre){
//            $current_genre= Genre::firstOrCreate(['id'=> $genre['mal_id']], ["name_en"=> $genre["name"]]);
//            $current_genre->animes()->syncWithoutDetaching($anime_id);
//        }
//    }
    public function addBatch(Request $request){
        $anime_list= $request->input('animes');
        $season= $request->input('season');
        $year= $request->input('year');
        $current_season= Season::firstOrCreate(['year' => $year, 'season'=> $season]);
        $anime_list= json_decode($anime_list, true);
        foreach ($anime_list as $anime){
            $data= array(
                'mal_id'=> $anime['mal_id'],
                'title_en'=> $anime['title'],
                'isAiring'=> $anime['continuing'],
                'start_at'=> $anime['airing_start'],
                'score'=> $anime['score'],
                'description'=> $anime['synopsis'],
                'image_url'=> $anime['image_url'],
                'episodes'=> $anime['episodes'],
                'season_id'=> $current_season->id,
            );
            $current_anime= Anime::firstOrCreate(['mal_id'=> $data['mal_id']], $data);
            $this->addStudio($anime["producers"], $current_anime->id);
//            $this->addGenres($anime["genres"], $current_anime->id);
        }
        return true;
    }
}
