<div class="list-item">
    <div class="anime-container">
        <div class="top">
            <h5 class="ar-title text-right">{{\Illuminate\Support\Str::limit($anime->title, 30)}}</h5>
            <h6 class="en-title text-right">{{\Illuminate\Support\Str::limit($anime->title_en, 30)}}</h6>
        </div>
        <div class="middle row">
            <img class="lazyload" data-src="{{$anime->image_url}}" alt="">
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
