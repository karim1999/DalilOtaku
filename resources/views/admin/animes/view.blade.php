@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

    <div class="form-container" >

        <div class="label-container">
            <a href="{{route("admin.animes.index")}}" class="label {{ request()->is('admin/animes') ? 'active' : '' }}">
                <h5>انميات تحت الترجمة</h5>
                <h5>{{$translating}}</h5>
            </a>
            <a href="{{route("admin.animes.published")}}" class="label {{ request()->is('admin/animes/published') ? 'active' : '' }}">
                <h5>انميات منشورة</h5>
                <h5>{{$published}}</h5>
            </a>
            <a href="{{route("admin.animes.airing")}}" class="label {{ request()->is('admin/animes/airing') ? 'active' : '' }}">
                <h5>انميات تعرض الان</h5>
                <h5>{{$airing}}</h5>
            </a>
        </div>
        <form method="get" action="">
            <div class="splitter">
                <h4 class="unique">فلتر:</h4>
                <span></span>
            </div>
            <div class="section">
                <div class="input-container">
                    <label for="search">عدد النتائج/صفحة:</label>
                    <select name="num" id="">
                        @for($i= 1; $i*10 <= 100; $i++)
                            <option {{request()->input('num') == $i*10 ? "selected" : ""}} value="{{$i*10}}">{{$i*10}}</option>
                        @endfor
                    </select>
                </div>
                <div class="input-container">
                    <label for="search"> بحث عن:</label>
                    <input placeholder="بحث..." type="text" name="search" value="{{request()->input('search')}}">
                </div>
                <div class="input-container">
                    <label for="search"> السنة:</label>
                    <input placeholder="مثال 2019" type="number" name="year" value="{{request()->input('year')}}">
                </div>
                <div class="input-container">
                    <label for="search"> الموسم:</label>
                    <select name="season" id="">
                        <option value=""></option>
                        <option {{request()->input('season') == "winter" ? "selected" : ""}} value="winter">الشتاء</option>
                        <option {{request()->input('season') == "spring" ? "selected" : ""}} value="spring">الربيع</option>
                        <option {{request()->input('season') == "summer" ? "selected" : ""}} value="summer">الصيف</option>
                        <option {{request()->input('season') == "fall" ? "selected" : ""}} value="fall">الخريف</option>
                    </select>
                </div>
            </div>
            <div class="section" id="tagsInput">
                <div id="multipleSelect" class="input-container" :assignDefault='assignDefault(@json($currentGenres))'>
                    <label for="search"> التصنيف:</label>
                    <multiselect :multiple="true" v-model="value" track-by="id"  :custom-label="nameLang" placeholder="Select one" :options='@json($genres)' :searchable="true" :allow-empty="true">
                    </multiselect>
                    <input style="display: none" hidden type="text" name="genres" :value="getGenresAsString">
                </div>
            </div>
            <button style="margin-bottom: 50px" type="submit">بحث</button>
        </form>
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{--        <a href="{{route("admin.animes.create")}}"><button class="add-btn">اضف</button></a>--}}
        @foreach($animes as $anime)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.animes.destroy", $anime->id)}}">
                @method('DELETE')
                @csrf
                <div class="img-container flex-1">
                    <img class="profile-img" src="{{$anime->image_url}}" alt="">
                </div>
                <div class="input-container flex-1">
                    @if($loop->first)
                        <label for="name">الاسم:</label>
                    @endif
                    <input disabled type="text" name="type_id" value="{{$anime->title_en}}" autofocus>
                </div>
                <div class="input-container flex-1">
                    @if($loop->first)
                        <label for="role">الوصف:</label>
                    @endif
                    <input disabled type="text" name="role" value="{{$anime->description}}" autofocus>
                </div>
                <div class="input-container flex-1">
                    @if($loop->first)
                        <label for="role">السنة:</label>
                    @endif
                    <input disabled type="text" name="role" value="{{$anime->year}}" autofocus>
                </div>
                <div class="input-container flex-1">
                    @if($loop->first)
                        <label for="role">الموسم:</label>
                    @endif
                    <input disabled type="text" name="role" value="{{$anime->season}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="role">التصنيفات:</label>
                    @endif
                    <div class="genres-container">
                        @foreach($anime->genres as $genre)
                            <h4>{{$genre->name ? $genre->name : $genre->name_en}}</h4>
                            @if(!$loop->last)
                                <h4>|</h4>
                            @endif

                        @endforeach
                    </div>
                </div>
                @can("edit animes")
                    <a href="{{route("admin.animes.edit", $anime->id)}}">
                        <button type="button" class="btn-edit">تعديل</button>
                    </a>
                @endcan
                @can("ban animes")
                    <button type="submit" class="btn-delete">حظر</button>
                @endcan
            </form>
        @endforeach
        {{ $animes->links() }}
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/multiple.js') }}" defer></script>
@endsection
