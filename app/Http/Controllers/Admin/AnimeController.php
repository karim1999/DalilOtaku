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
        $data= [
            'animes' => Anime::where('banned', '0')->whereNull("title")->paginate(10),
            'published' => Anime::where('banned', '0')->whereNotNull("title")->count(),
            'airing' => Anime::where('banned', '0')->where("is_airing", 1)->count(),
            'translating' => Anime::where('banned', '0')->whereNull("title")->count(),
        ];
        return view("admin.animes.view", $data);
    }
    public function published(){
        $data= [
            'animes' => Anime::where('banned', '0')->where("title", "")->paginate(10),
            'published' => Anime::where('banned', '0')->whereNotNull("title")->count(),
            'airing' => Anime::where('banned', '0')->where("is_airing", 1)->count(),
            'translating' => Anime::where('banned', '0')->whereNull("title")->count(),
        ];
        return view("admin.animes.view", $data);
    }
    public function airing(){
        $data= [
            'animes' => Anime::where('banned', '0')->where("is_airing", 1)->paginate(10),
            'published' => Anime::where('banned', '0')->whereNotNull("title")->count(),
            'airing' => Anime::where('banned', '0')->where("is_airing", 1)->count(),
            'translating' => Anime::where('banned', '0')->whereNull("title")->count(),
        ];
        return view("admin.animes.view", $data);
    }
    public function create(){
        $data= [];
        return view("admin.animes.form", $data);
    }
    public function edit(Anime $anime){
        return view("admin.animes.form", $anime);
    }

    public function store(Request $request){
        $anime= new Anime();
        $anime->name_en= $request->input("name_en");
        $anime->name= $request->input("name");
        $anime->save();
        return redirect()->route('admin.animes.index')->with('status', 'تم اضافة انمي بنجاح');
    }
    public function update(Anime $anime, Request $request){
        $anime->name_en= $request->input("name_en");
        $anime->name= $request->input("name");
        $anime->save();
        return back()->with('status', 'تم تعديل الانمي بنجاح');
    }

    public function destroy(Anime $anime){
//        $anime->delete();
        $anime->banned= 1;
        $anime->save();
        return back()->with('status', 'تم حظر الانمي بنجاح');
    }
    public function enable($anime_id){
        $anime= Anime::findOrFail($anime_id);
        $anime->banned= 0;
        $anime->save();
        return back()->with('status', 'تم فك حظر الانمي بنجاح');
    }

    public function fetch(){
        $data= [];
        return view("admin.animes.fetch", $data);
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
                'is_airing'=> $anime['continuing'],
                'start_at'=> $anime['airing_start'],
                'score'=> $anime['score'],
                'description'=> $anime['synopsis'],
                'image_url'=> $anime['image_url'],
                'episodes'=> $anime['episodes'],
                'season_id'=> $current_season->id,
                'mal'=> $anime['url'],
            );
            $current_anime= Anime::firstOrCreate(['mal_id'=> $data['mal_id']], $data);
            $this->addStudio($anime["producers"], $current_anime->id);
//            $this->addGenres($anime["genres"], $current_anime->id);
        }
        return true;
    }
}
