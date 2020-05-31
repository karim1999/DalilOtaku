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
        @if(!(isset($disable_secondary_nav) && $disable_secondary_nav))
            <div class="main-nav secondary-nav">
                <ul class="middle-nav">
                    <li class="{{ (request()->is('all')) ? 'active' : '' }}"><a href="{{route("home.all")}}"><i class="fa fa-list"></i></a></li>
                    <li class="{{ (request()->is('all')) ? 'active' : '' }}"><a href="{{route("home.all")}}">عرض الكل</a></li>
                    <li class="{{ (request()->is('season/winter') || (isset($current_season) && $current_season == 'winter') ) ? 'active' : '' }}"><a href="{{route("season.show", "winter")}}"><i class="fa fa-snowflake"></i> الشتاء</a></li>
                    <li class="{{ (request()->is('season/spring') || (isset($current_season) && $current_season == 'spring') ) ? 'active' : '' }}"><a href="{{route("season.show", "spring")}}"><i class="fa fa-cloud-sun"></i> الربيع</a></li>
                    <li class="{{ (request()->is('season/summer') || (isset($current_season) && $current_season == 'summer') ) ? 'active' : '' }}"><a href="{{route("season.show", "summer")}}"><i class="fa fa-sun"></i> الصيف</a></li>
                    <li class="{{ (request()->is('season/fall') || (isset($current_season) && $current_season == 'fall') ) ? 'active' : '' }}"><a href="{{route("season.show", "fall")}}"><i class="fa fa-leaf"></i> الخريف</a></li>
                    <li class="{{ (request()->is('type/tv')) ? 'active' : '' }}"><a href="{{route("type.show", "tv")}}">انمي</a></li>
                    <li class="{{ (request()->is('type/ova')) ? 'active' : '' }}"><a href="{{route("type.show", "ova")}}">اوفا</a></li>
                    <li class="{{ (request()->is('type/ona')) ? 'active' : '' }}"><a href="{{route("type.show", "ona")}}">اونا</a></li>
                    <li class="{{ (request()->is('type/movie')) ? 'active' : '' }}"><a href="{{route("type.show", "movie")}}">افلام</a></li>
                    <li class="{{ (request()->is('type/special')) ? 'active' : '' }}"><a href="{{route("type.show", "special")}}">خاص</a></li>
                    <li class="{{ (request()->is('airing')) ? 'active' : '' }}"><a href="{{route("airing")}}">انمي مستمر</a></li>
                </ul>
            </div>
        @endif
        <div class="list-container" id="anime_list">
            @forelse ($animes as $anime)
                @include("partials.anime_card1", ["anime" => $anime])
            @empty
                <p class="empty">لا يوجد بيانات</p>
            @endforelse
        </div>
{{--            {{ $animes->appends(['search' => Request::get('search')])->links() }}--}}
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/animeList.js') }}" defer></script>
@endsection
