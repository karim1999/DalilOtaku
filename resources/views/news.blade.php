@extends('layouts.main')
@section('title', 'اخر الاخبار')
@section('description', 'موقع انميات')

@section('content')
    <div class="content news">
        <div class="filter">
            <h4 class="unique2 text-center">خيارات العرض</h4>
            <ul class="list-container text-right" id="dropdown">
                <li class="{{ (request()->is('news')) ? 'active' : '' }}"><a href="{{route("news")}}"><i></i> عرض كل النتائج</a><i class="far fa-check-circle"></i></li>
                <drop-down-item status="{{ (request()->is('news/website*')) ? 1 : "" }}" title=" مواقع الكترونية" icon-name="fa fa-newspaper" status="1">
                    @foreach($website_sources as $source)
                        <li class="{{ (request()->is('news/website/'.$source->id)) ? 'active' : '' }}"><a href="{{route("news.website", $source->id)}}">{{$source->name}}</a></li>
                    @endforeach
                </drop-down-item>
                <drop-down-item status="{{ (request()->is('news/twitter*')) ? 1 : "" }}" title=" حسابات تويتر" icon-name="fab fa-twitter-square">
                    @foreach($twitter_sources as $source)
                        <li class="{{ (request()->is('news/twitter/'.$source->id)) ? 'active' : '' }}"><a href="{{route("news.twitter", $source->id)}}">{{$source->name}}</a></li>
                    @endforeach
                </drop-down-item>
{{--                <drop-down-item title=" حسابات فيسبوك" icon-name="fab fa-facebook-square"></drop-down-item>--}}
{{--                <drop-down-item title=" حسابات انستجرام" icon-name="fab fa-instagram-square"></drop-down-item>--}}
{{--                <drop-down-item title=" حسب التاريخ" icon-name="fa fa-calendar-alt" status="1">--}}
{{--                    <input placeholder="من..." type="text" name="from">--}}
{{--                    <input placeholder="الي..." type="text" name="to">--}}
{{--                    <button>أعرض</button>--}}
{{--                </drop-down-item>--}}
            </ul>
        </div>
        <div class="news-area" id="newsArea">
            @foreach ($items as $item)
                <div class="news-item">
                    @if(isset($item->user))
                        <img width="200" height="300" src="{{isset($item->entities->media) ? $item->entities->media[0]->media_url : str_replace("_normal", "", $item->user->profile_image_url)}}" alt="">
                    @endif
{{--                    @if($item->image)--}}
{{--                        <img width="200" height="300" src="{{$item->image}}" alt="">--}}
{{--                    @endif--}}
                    <div class="left-container">
                        <div class="top">
                            @if(isset($item->title))
                                <h4>{{$item->title}}</h4>
                            @endif
                            <p>{{$item->full_text}}</p>
                        </div>
                        <div class="bottom">
                            <a target="_blank" href="{{isset($item->websiteLink) ? $item->websiteLink : Twitter::linkUser($item->user)}}"><h4 class="unique">{{isset($item->websiteTitle) ? $item->websiteTitle : $item->user->name}}</h4></a>
                            <div class="bottom-left">
                                <h5 class="date">{{$item->created_at}}</h5>
                                <a target="_blank" href="{{isset($item->link) ? $item->link : Twitter::linkTweet($item)}}"><button>اقرأ المزيد</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dropdown.js') }}" defer></script>
@endsection
