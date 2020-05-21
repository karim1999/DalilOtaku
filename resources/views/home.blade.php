@extends('layouts.main')

@section('content')
    <div class="content no-padding">
        @if(isset($title))
            <h3 class="text-center unique2">{{$title}}</h3>
        @endif
        @if(isset($welcome_title))
            <div class="alert-info col-6 col-md-10">
                <h4>{{$welcome_title}}</h4>
                <p>{{$welcome_content}}</p>
                @if($welcome_link)
                    <a href="{{$welcome_link}}"><button>اضغط هنا</button></a>
                @endif
            </div>
        @endif
        <div class="main-nav secondary-nav">
            <ul class="middle-nav">
                <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route("home")}}"><i class="fa fa-list unique"></i></a></li>
                <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route("home")}}">عرض الكل</a></li>
                <li class="{{ (request()->is('season/spring')) ? 'active' : '' }}"><a href="{{route("season.show", "spring")}}"><i class="fa fa-cloud-sun"></i> الربيع</a></li>
                <li class="{{ (request()->is('season/summer')) ? 'active' : '' }}"><a href="{{route("season.show", "summer")}}"><i class="fa fa-sun"></i> الصيف</a></li>
                <li class="{{ (request()->is('season/autumn')) ? 'active' : '' }}"><a href="{{route("season.show", "autumn")}}"><i class="fa fa-leaf"></i> الخريف</a></li>
                <li class="{{ (request()->is('season/winter')) ? 'active' : '' }}"><a href="{{route("season.show", "winter")}}"><i class="fa fa-snowflake"></i> الشتاء</a></li>
                <li class="{{ (request()->is('type/tv')) ? 'active' : '' }}"><a href="{{route("type.show", "tv")}}">انمي</a></li>
                <li class="{{ (request()->is('type/ova')) ? 'active' : '' }}"><a href="{{route("type.show", "ova")}}">اوفا</a></li>
                <li class="{{ (request()->is('type/ona')) ? 'active' : '' }}"><a href="{{route("type.show", "ona")}}">اونا</a></li>
                <li class="{{ (request()->is('type/movie')) ? 'active' : '' }}"><a href="{{route("type.show", "movie")}}">افلام</a></li>
                <li class="{{ (request()->is('type/special')) ? 'active' : '' }}"><a href="{{route("type.show", "special")}}">خاص</a></li>
                <li class="{{ (request()->is('airing')) ? 'active' : '' }}"><a href="{{route("airing")}}">انمي مستمر</a></li>
            </ul>
        </div>
        <div class="list-container">
            @foreach ($animes as $anime)
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
                                        <li><i class="fa fa-calendar-alt unique"></i>{{date("F j, Y", strtotime($anime->start_at))}}</li>
                                    @endif
                                    @if($anime->score)
                                        <li><i class="fa fa-star unique"></i>التقييم: {{$anime->score}}</li>
                                    @endif
                                    @if($anime->episodes)
                                        <li><i class="fa fa-film unique"></i>{{$anime->episodes}} حلقة</li>
                                    @endif
                                    @if($anime->studios()->count() > 0)
                                        <li><i class="fa fa-pen unique"></i>استديو {{$anime->studios()->first()->name_en}}</li>
                                    @endif
                                    @if($anime->is_airing)
                                        <li><i class="fa fa-play-circle unique"></i>الحلقة 4 بعد 3 يوم 4 ساعات 20 دقيقة</li>
                                    @else
                                        <li><i class="fa fa-play-circle unique"></i>منتهي</li>
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
                    <div class="actions-area row">
                        <p class="clickable">32<i class="far fa-bookmark"></i></p>
                        <p class="clickable">20<i class="far fa-heart"></i></p>
                        <i class="fa fa-ellipsis-v clickable"></i>
                    </div>
                </div>
            @endforeach
            {{ $animes->links() }}
        </div>
    </div>
@endsection
