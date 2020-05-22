@extends('layouts.main')

@section('content')
    <div class="content no-padding">
        @if(!(isset($disable_secondary_nav) && $disable_secondary_nav))
            <div class="main-nav secondary-nav">
                <ul class="middle-nav">
                    <li class="{{ (request()->is('profile/favorites')) ? 'active' : '' }}"><a href="{{route("profile.favorites")}}"><i class="fa fa-heart"></i> المفضلة</a></li>
                    <li class="{{ (request()->is('profile/watching')) ? 'active' : '' }}"><a href="{{route("profile.watching")}}"><i class="fa fa-film"></i> الانميات المتابعة</a></li>
                    <li class="{{ (request()->is('profile/watched')) ? 'active' : '' }}"><a href="{{route("profile.watched")}}"><i class="fa fa-check-square"></i> تمت مشاهدتها</a></li>
                    <li class="{{ (request()->is('profile/later')) ? 'active' : '' }}"><a href="{{route("profile.later")}}"><i class="fa fa-video"></i> مشاهدة لاحقا</a></li>
                    <li class="{{ (request()->is('profile/bookmarked')) ? 'active' : '' }}"><a href="{{route("profile.bookmarked")}}"><i class="fa fa-bookmark"></i> الانميات المحفوظة</a></li>
                    <li class="{{ (request()->is('profile/settings')) ? 'active' : '' }}"><a href="{{route("profile.settings")}}"><i class="fa fa-cog"></i> الاعدادات</a></li>
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="list-container col-11 version2" id="anime_list">
            @if(isset($animes))
                @forelse ($animes as $anime)
                    @include("partials.anime_card2", ["anime" => $anime])
                @empty
                    <p class="empty">لا يوجد بيانات</p>
                @endforelse
                {{ $animes->links() }}
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/animeList.js') }}" defer></script>
@endsection
