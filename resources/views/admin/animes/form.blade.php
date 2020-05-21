@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{isset($id) ? route("admin.animes.update", $id) : route("admin.animes.store")}}">
        @if(isset($id))
            @method('PUT')
        @else
            @method('POST')
        @endif
        @csrf
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="input-container">
            <label for="title_en">الاسم بالانجليزية:</label>
            <input placeholder="اكتب الاسم بالانجليزية..." type="text" name="title_en" required value="{{isset($title_en) ? $title_en : ""}}" autofocus>
        </div>
        <div class="input-container">
            <label for="title">الاسم بالعربية:</label>
            <input placeholder="اكتب الاسم بالعربية..." type="text" name="title" required value="{{isset($title) ? $title : ""}}">
        </div>
        <div class="input-container">
            <label for="description_en">الوصف بالانجليزية:</label>
            <textarea placeholder="اكتب الوصف بالانجليزية..." required name="description_en">{{isset($description_en) ? $description_en : ""}}</textarea>
        </div>
        <div class="input-container">
            <label for="description">الوصف بالعربية:</label>
            <textarea placeholder="اكتب الوصف بالعربية..." required name="description">{{isset($description) ? $description : ""}}</textarea>
        </div>
        <div class="input-container">
            <label for="title_en">رابط الفيسبوك:</label>
            <input placeholder="اكتب رابط الفيسبوك..." type="text" name="facebook" value="{{isset($facebook) ? $facebook : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط تويتر:</label>
            <input placeholder="اكتب رابط تويتر..." type="text" name="twitter" value="{{isset($twitter) ? $twitter : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط انستجرام:</label>
            <input placeholder="اكتب رابط انستجرام..." type="text" name="instagram" value="{{isset($instagram) ? $instagram : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط اليوتيوب:</label>
            <input placeholder="اكتب رابط اليوتيوب..." type="text" name="youtube" value="{{isset($youtube) ? $youtube : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">My Anime List:</label>
            <input placeholder="اكتب رابط MAL..." type="text" name="mal" value="{{isset($mal) ? $mal : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط الموقع:</label>
            <input placeholder="اكتب رابط الموقع..." type="text" name="website" value="{{isset($website) ? $website : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط ani search:</label>
            <input placeholder="اكتب رابط ani_search..." type="text" name="ani_search" value="{{isset($ani_search) ? $ani_search : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط anime planet:</label>
            <input placeholder="اكتب رابط الموقع..." type="text" name="anime_planet" value="{{isset($anime_planet) ? $anime_planet : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط ani db:</label>
            <input placeholder="اكتب رابط ani_db..." type="text" name="ani_db" value="{{isset($ani_db) ? $ani_db : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط kitsu:</label>
            <input placeholder="اكتب رابط kitsu..." type="text" name="kitsu" value="{{isset($kitsu) ? $kitsu : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط crunchyroll:</label>
            <input placeholder="اكتب رابط crunchyroll..." type="text" name="crunchyroll" value="{{isset($crunchyroll) ? $crunchyroll : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط anilist:</label>
            <input placeholder="اكتب رابط anilist..." type="text" name="anilist" value="{{isset($anilist) ? $anilist : ""}}">
        </div>
        <div class="input-container">
            <label for="title_en">رابط live chart:</label>
            <input placeholder="اكتب رابط live_chart..." type="text" name="live_chart" value="{{isset($live_chart) ? $live_chart : ""}}">
        </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
