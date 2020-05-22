@extends('layouts.main')
@section('title', 'التقويم')
@section('description', 'موقع انميات')

@section('content')
    <div class="content">
        <h4 class="unique2 text-right">السبت 6-5-2020</h4>
        <div class="list-container col-12 version2">
            @for ($i = 0; $i < 4; $i++)
                @include("partials.anime_card2")
            @endfor
        </div>
        <h4 class="unique2 text-right">الاحد 7-5-2020</h4>
        <div class="list-container col-12 version2">
            @for ($i = 0; $i < 2; $i++)
                @include("partials.anime_card2")
            @endfor
        </div>
    </div>

@endsection
