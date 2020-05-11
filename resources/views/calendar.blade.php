@extends('layouts.main')
@section('title', 'التقويم')
@section('description', 'موقع انميات')

@section('content')
    <div class="content">
        <h4 class="unique2 text-right">السبت 6-5-2020</h4>
        <div class="list-container col-12 version2">
            @for ($i = 0; $i < 4; $i++)
                <div class="list-item">
                    <div class="anime-container">
                        <div class="top">
                            <h5 class="ar-title text-right">سورد ارد اونلاين اليزايزيشن</h5>
                            <h6 class="en-title text-right">Sword Art Online Alicization</h6>
                        </div>
                        <div class="middle row">
                            <img src="{{asset("assets/anime.png")}}" alt="">
                        </div>
                    </div>
                    <div class="actions-area row">
                        <p class="clickable">32<i class="far fa-bookmark"></i></p>
                        <p class="clickable">20<i class="far fa-heart"></i></p>
                        <i class="fa fa-ellipsis-v clickable"></i>
                    </div>
                </div>
            @endfor
        </div>
        <h4 class="unique2 text-right">الاحد 7-5-2020</h4>
        <div class="list-container col-12 version2">
            @for ($i = 0; $i < 2; $i++)
                <div class="list-item">
                    <div class="anime-container">
                        <div class="top">
                            <h5 class="ar-title text-right">سورد ارد اونلاين اليزايزيشن</h5>
                            <h6 class="en-title text-right">Sword Art Online Alicization</h6>
                        </div>
                        <div class="middle row">
                            <img src="{{asset("assets/anime.png")}}" alt="">
                        </div>
                    </div>
                    <div class="actions-area row">
                        <p class="clickable">32<i class="far fa-bookmark"></i></p>
                        <p class="clickable">20<i class="far fa-heart"></i></p>
                        <i class="fa fa-ellipsis-v clickable"></i>
                    </div>
                </div>
            @endfor
        </div>
    </div>

@endsection
