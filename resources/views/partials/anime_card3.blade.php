<div class="list-item">
    <div class="anime-container">
        <div class="middle row">
            <img class="lazyload" data-src="{{$anime->image_url}}" alt="">
            <div class="left">
                <ul>
                    @if($anime->airing_at)
                        <anime-time mal-id="{{$anime->mal_id}}" status="{{$anime->is_airing}}" airing-at="{{$anime->airing_at}}" current-episode="{{$anime->last_episode}}" ></anime-time>
                    @endif
                    @if($anime->score)
                        <li><i class="fa fa-star unique"></i>{{$anime->score * 10}}%</li>
                    @endif
                    @if($anime->favorites)
                        <li><i class="fa fa-heart unique"></i>{{count($anime->favorites)}}</li>
                    @endif
                </ul>
                <p>{{$anime->description}}</p>
                <ul class="sources row">
                    <li><a href="{{$anime->ani_planet}}" class="{{$anime->ani_planet ? "active" : ""}}"><img src="{{asset("assets/icons1/aS.svg")}}" alt=""></a></li>
                    <li><a href="{{$anime->ani_db}}" class="{{$anime->ani_db ? "active" : ""}}"><img src="{{asset("assets/icons1/Fox.svg")}}" alt=""></a></li>
                    <li><a href="{{$anime->website}}" class="{{$anime->website ? "active" : ""}}"><img src="{{asset("assets/icons1/link.svg")}}" alt=""></a></li>
                    <li><a href="{{$anime->mal}}" class="{{$anime->mal ? "active" : ""}}"><img src="{{asset("assets/icons1/MAL.svg")}}" alt=""></a></li>
                    <li><a href="{{$anime->youtube}}" class="{{$anime->youtube ? "active" : ""}}"><img src="{{asset("assets/icons1/Yout.svg")}}" alt=""></a></li>
                    <li><a href="{{$anime->ani_search}}" class="{{$anime->ani_search ? "active" : ""}}"><img src="{{asset("assets/icons1/aS.svg")}}" alt=""></a></li>
                </ul>
                <div class="bottom">
                    <ul class="categories">
                        @for($i = 0; $i < count($anime->genres) && $i < 3; $i++)
                            <li>
                                <a href="" class="btn-category">
                                    {{$anime->genres[$i]->name ? $anime->genres[$i]->name : $anime->genres[$i]->name_en}}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

