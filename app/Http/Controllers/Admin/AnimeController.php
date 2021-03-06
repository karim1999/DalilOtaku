<?php

namespace App\Http\Controllers\Admin;

use App\Anime;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Season;
use App\Studio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    //
    public function index(Request $request){
        $animes= Anime::where('banned', '0')->whereNull("description");
        $animes= $this->filterAnime($animes, $request);
        $genres= Genre::all();
        $currentGenres= array();
        if($request->input('genres')){
            $currentGenres= Genre::whereIn("id", explode(",", request()->input("genres")))->get();
        }

        $data= [
            "currentGenres"=> $currentGenres,
            'genres'=> $genres,
            'animes' => $animes,
            'published' => Anime::where('banned', '0')->whereNotNull("description")->count(),
            'airing' => Anime::where('banned', '0')->where("is_airing", 1)->count(),
            'translating' => Anime::where('banned', '0')->whereNull("title")->count(),
        ];
        return view("admin.animes.view", $data);
    }
    public function published(Request $request){
        $animes= Anime::where('banned', '0')->whereNotNull("description");
        $animes= $this->filterAnime($animes, $request);
        $genres= Genre::all();
        $currentGenres= array();
        if($request->input('genres')){
            $currentGenres= Genre::whereIn("id", explode(",", request()->input("genres")))->get();
        }

        $data= [
            "currentGenres"=> $currentGenres,
            'genres'=> $genres,
            'animes' => $animes,
            'published' => Anime::where('banned', '0')->whereNotNull("description")->count(),
            'airing' => Anime::where('banned', '0')->where("is_airing", 1)->count(),
            'translating' => Anime::where('banned', '0')->whereNull("description")->count(),
        ];
        return view("admin.animes.view", $data);
    }
    private function filterAnime($animes, $request){
        if($request->input('genres')){
            $genres= explode(",", request()->input("genres"));
            foreach ($genres as $genre){
                $animes= $animes->whereHas('genres', function (Builder $query) use($genre) {
                    $query->where('genres.id', $genre);
                });
            }
        }
        if($request->input('search')){
            $search= $request->input('search');
            $animes= $animes->where(function ($query) use ($search) {
                $query->where("title", "like", "%".$search."%")->orWhere("title_en", "like", "%".$search."%");
            });
        }
        if($request->input('year')){
            $year= $request->input('year');
            $animes= $animes->where("year", $year);
        }
        if($request->input('season')){
            $season= $request->input('season');
            $animes= $animes->where("season", $season);
        }

        if($request->input('num')){
            $num= $request->input('num');
            $animes= $animes->paginate($num);
        }else{
            $animes= $animes->paginate(10);
        }
        return $animes;
    }
    public function airing(Request $request){
        $animes= Anime::where('banned', '0')->where("is_airing", 1);
        $animes= $this->filterAnime($animes, $request);
        $genres= Genre::all();
        $currentGenres= array();
        if($request->input('genres')){
            $currentGenres= Genre::whereIn("id", explode(",", request()->input("genres")))->get();
        }

        $data= [
            "currentGenres"=> $currentGenres,
            'genres'=> $genres,
            'animes' => $animes,
            'published' => Anime::where('banned', '0')->whereNotNull("description")->count(),
            'airing' => Anime::where('banned', '0')->where("is_airing", 1)->count(),
            'translating' => Anime::where('banned', '0')->whereNull("description")->count(),
        ];
        return view("admin.animes.view", $data);
    }
//    public function create(){
//        $data= [];
//        return view("admin.animes.form", $data);
//    }
    public function edit(Anime $anime){
        return view("admin.animes.form", $anime);
    }

//    public function store(Request $request){
//        $anime= new Anime();
//        $anime->name_en= $request->input("name_en");
//        $anime->name= $request->input("name");
//        $anime->save();
//        return redirect()->route('admin.animes.index')->with('status', 'تم اضافة انمي بنجاح');
//    }
    public function update(Anime $anime, Request $request){
        $anime->title_en= $request->input("title_en");
        $anime->title= $request->input("title");
        $anime->description= $request->input("description");
        $anime->description_en= $request->input("description_en");
        $anime->facebook= $request->input("facebook");
        $anime->twitter= $request->input("twitter");
        $anime->instagram= $request->input("instagram");
        $anime->youtube= $request->input("youtube");
        $anime->mal= $request->input("mal");
        $anime->website= $request->input("website");
        $anime->ani_search= $request->input("ani_search");
        $anime->ani_planet= $request->input("anime_planet");
        $anime->ani_db= $request->input("ani_db");
        $anime->kitsu= $request->input("kitsu");
        $anime->crunchyroll= $request->input("crunchyroll");
        $anime->anilist= $request->input("anilist");
        $anime->live_chart= $request->input("live_chart");
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
            $current_studio= Studio::firstOrCreate(["name_en"=> $studio["name"]]);
            $current_studio->animes()->syncWithoutDetaching($anime_id);
        }
    }
    public function addGenres($genres, $anime_id){
        foreach ($genres as $genre){
            $current_genre= Genre::firstOrCreate(["name_en"=> $genre]);
            $current_genre->animes()->syncWithoutDetaching($anime_id);
        }
    }
    private function make_time($arr){
        if(!$arr["month"])
            return null;
        return mktime(0, 0, 0, $arr["month"], $arr["day"], $arr["year"]);
    }
    private function loop_over_animes($anime_list){
        foreach ($anime_list as $anime){
            $data= array(
                //anichart
                'mal_id'=> $anime['idMal'],
                'title_en'=> $anime['title']['userPreferred'],
                'description_en'=> $anime['description'],
                'type'=> $anime['format'],
                'is_airing'=> ($anime['status'] == "RELEASING" || $anime['status'] == "NOT_YET_RELEASED") ? true : false,
                'releasing'=> $anime['status'] == "RELEASING" ? true : false,
                'start_at'=> $anime['startDate'] ? $this->make_time($anime['startDate']) : null,
                'end_at'=> $anime['endDate'] ? $this->make_time($anime['endDate']) : null,
                'score'=> $anime['averageScore']/10,
                'image_url'=> $anime['coverImage']['large'],
                'episodes'=> $anime['episodes'],
                'season'=> $anime['season'],
                'year'=> $anime['seasonYear'],
                'anilist'=> $anime['siteUrl'],
                'last_episode'=> $anime['nextAiringEpisode'] ? $anime['nextAiringEpisode']['episode'] : null,
                'airing_at'=> $anime['nextAiringEpisode'] ? $anime['nextAiringEpisode']['airingAt'] : null,

                //Testing
                'title'=> "هذا النص هو مثال لنص",
                'description'=> "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.",
            );
            $current_anime= Anime::updateOrCreate(['mal_id'=> $data['mal_id']], $data);
            $this->addStudio($anime["studios"]["nodes"], $current_anime->id);
            $this->addGenres($anime["genres"], $current_anime->id);
        }
    }
    public function addBatch(Request $request){
        $anime_list= $request->input('animes');
        $anime_list= json_decode($anime_list, true);
        $this->loop_over_animes($anime_list);
        return true;
    }

    public function fetch_data_from_server(){
        $statusArray= ["RELEASING", "NOT_YET_RELEASED"];
        $curl = curl_init();
        foreach ($statusArray as $status){
            $page= 1;
            $hasNextPage= true;
            while($hasNextPage){

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://graphql.anilist.co",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>"{\"query\":\"{\\r\\nPage (page: $page, perPage: 50) {\\r\\npageInfo {\\r\\ntotal\\r\\ncurrentPage\\r\\nlastPage\\r\\nhasNextPage\\r\\nperPage\\r\\n}\\r\\nmedia(type: ANIME, status: $status) {\\r\\nidMal\\r\\nformat\\r\\nsiteUrl\\r\\nstatus\\r\\nstartDate {\\r\\nyear\\r\\nmonth\\r\\nday\\r\\n}\\r\\nendDate {\\r\\nyear\\r\\nmonth\\r\\nday\\r\\n}\\r\\naverageScore\\r\\ndescription\\r\\nepisodes\\r\\nseason\\r\\nseasonYear\\r\\ntype\\r\\ngenres\\r\\nstudios (isMain: true) {\\r\\nnodes {\\r\\n  id\\r\\n  name\\r\\n}\\r\\n}\\r\\ncoverImage {\\r\\nextraLarge\\r\\nlarge\\r\\nmedium\\r\\ncolor\\r\\n}\\r\\nbannerImage\\r\\ntitle {\\r\\nromaji\\r\\nenglish\\r\\nnative\\r\\nuserPreferred\\r\\n}\\r\\nnextAiringEpisode {\\r\\ntimeUntilAiring\\r\\nairingAt\\r\\nepisode\\r\\n}\\r\\n}\\r\\n}\\r\\n}\",\"variables\":{}}",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/json"
                    ),
                ));

                $response = json_decode(curl_exec($curl), true)["data"];
                $hasNextPage= $response["Page"]["pageInfo"]["hasNextPage"];
                $this->loop_over_animes($response["Page"]["media"]);
                echo "Page number $page in $status Animes has just finished fetching.\n";
                $response= null;
                $page++;
            }
        }
        curl_close($curl);
        return;
    }
}
