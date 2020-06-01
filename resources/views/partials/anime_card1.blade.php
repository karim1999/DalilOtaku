<div class="list-item">
    <div class="anime-container">
        <div class="top">
            <h5 class="ar-title text-center">{{$anime->title}}</h5>
            <h6 class="en-title text-center">{{$anime->title_en}}</h6>
            <ul class="categories row">
                @foreach ($anime->genres as $genre)
                    <li>
                        <a href="{{route("genre.show", $genre->id)}}">
                            {{$genre->name_en}}
                        </a>
                    </li>
                    @if(!$loop->last)
                        -
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="middle row">
            <img src="{{$anime->image_url}}" alt="">
            <div class="left">
                <ul>
                    @if($anime->start_at)
                        <li><i class="fa fa-calendar-alt unique"></i>{{date("F j, Y", $anime->start_at)}}</li>
                    @endif
                    @if($anime->score)
                        <li><i class="fa fa-star unique"></i>التقييم: {{$anime->score}}</li>
                    @endif
                    @if($anime->episodes)
                        <li><i class="fa fa-film unique"></i>{{$anime->episodes}} حلقة</li>
                    @endif
                    @if($anime->studios()->count() > 0)
                        <li><i class="fa fa-pen unique"></i>استديو {{$anime->studios[0]->name_en}}</li>
                    @endif
                    @if($anime->airing_at)
                        <anime-time mal-id="{{$anime->mal_id}}" :status="{{$anime->is_airing}}" airing-at="{{$anime->airing_at}}"></anime-time>
                    @endif
                </ul>
                <p>{{$anime->description}}</p>
            </div>
        </div>
        <div class="bottom">
            <ul class="sources row">
                <li><a href="{{$anime->ani_db}}" class="{{$anime->ani_db ? "active" : ""}}"><img src="{{asset("assets/icons1/aDB.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->anilist}}" class="{{$anime->anilist ? "active" : ""}}"><img src="{{asset("assets/icons1/AL.svg")}}" alt=""></a></li>
                {{--                                <li><a href="{{$anime->ani_db}}" class="{{$anime->ani_db ? "active" : ""}}"><img src="{{asset("assets/icons1/AP.svg")}}" alt=""></a></li>--}}
                <li><a href="{{$anime->ani_planet}}" class="{{$anime->ani_planet ? "active" : ""}}"><img src="{{asset("assets/icons1/aS.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->facebook}}" class="{{$anime->facebook ? "active" : ""}}"><img src="{{asset("assets/icons1/Face.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->ani_db}}" class="{{$anime->ani_db ? "active" : ""}}"><img src="{{asset("assets/icons1/Fox.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->instagram}}" class="{{$anime->instagram ? "active" : ""}}"><img src="{{asset("assets/icons1/Inst.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->website}}" class="{{$anime->website ? "active" : ""}}"><img src="{{asset("assets/icons1/link.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->mal}}" class="{{$anime->mal ? "active" : ""}}"><img src="{{asset("assets/icons1/MAL.svg")}}" alt=""></a></li>
                {{--                                <li><a href="{{$anime->ani_db}}" class="{{$anime->ani_db ? "active" : ""}}"><img src="{{asset("assets/icons1/Moon.svg")}}" alt=""></a></li>--}}
                <li><a href="{{$anime->twitter}}" class="{{$anime->twitter ? "active" : ""}}"><img src="{{asset("assets/icons1/Twit.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->youtube}}" class="{{$anime->youtube ? "active" : ""}}"><img src="{{asset("assets/icons1/Yout.svg")}}" alt=""></a></li>
                <li><a href="{{$anime->ani_search}}" class="{{$anime->ani_search ? "active" : ""}}"><img src="{{asset("assets/icons1/aS.svg")}}" alt=""></a></li>
            </ul>
        </div>
    </div>
    @auth
        <anime-actions
            favorites="{{$anime->favorites()->count()}}"
            bookmarks="{{$anime->bookmarks()->count()}}"
            is-favorite="{{auth()->user()->favorites->contains($anime->id)}}"
            is-bookmarked="{{auth()->user()->bookmarks->contains($anime->id)}}"
            is-watching="{{auth()->user()->watching()->where(["anime_id" => $anime->id, "status" => "watching"])->exists()}}"
            is-watched="{{auth()->user()->watching()->where(["anime_id" => $anime->id, "status" => "watched"])->exists()}}"
            is-later="{{auth()->user()->watching()->where(["anime_id" => $anime->id, "status" => "later"])->exists()}}"
            url="{{route("home")."/add/".$anime->id}}"
        ></anime-actions>
    @endauth
</div>
