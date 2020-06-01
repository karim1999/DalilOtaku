@extends('layouts.main')

@section('content')
    <div class="content no-padding">
        @if(isset($title))
            <h3 class="text-center unique2">{{$title}}</h3>
        @endif
        <div class="list-container" id="anime_list">
            @forelse ($animes as $anime)
                @include("partials.anime_card1", ["anime" => $anime])
            @empty
                <p class="empty">لا يوجد بيانات</p>
            @endforelse
        </div>
            {{ $animes->links() }}
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/animeList.js') }}" defer></script>
@endsection
