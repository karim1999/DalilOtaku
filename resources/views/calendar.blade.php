@extends('layouts.main')
@section('title', 'التقويم')
@section('description', 'موقع انميات')

@section('content')
    <div class="content">
        @foreach ($calendar as $day)
            <h3 class="unique2 text-right">{{$day["name"]}}</h3>
            <h4 class="unique2 text-right">{{$day["date"]}}</h4>
            <div class="list-container col-12 version2">
                @forelse ($day["animes"] as $anime)
                    @include("partials.anime_card2", ["anime", $anime])
                @empty
                    <p>لا يوجد بيانات</p>
                @endforelse
            </div>
        @endforeach
    </div>

@endsection
