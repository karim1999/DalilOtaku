@extends('admin.layouts.app')

@section('content')
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
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">الاسم:</label>
                    @endif
                    <input disabled type="text" name="type_id" value="{{$anime->title_en}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="role">الوصف:</label>
                    @endif
                    <input disabled type="text" name="role" value="{{$anime->description}}" autofocus>
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
