@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        <div class="label-container">
            <a href="{{route("admin.banned.animes")}}" class="label {{ request()->is('admin/banned') ? 'active' : '' }}">
                <h5>انميات محظورة</h5>
                <h5>{{$banned_animes}}</h5>
            </a>
            <a href="{{route("admin.banned.genres")}}" class="label {{ request()->is('admin/banned/genres') ? 'active' : '' }}">
                <h5>تصنيفات محظورة</h5>
                <h5>{{$banned_genres}}</h5>
            </a>
        </div>
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{--        <a href="{{route("admin.animes.create")}}"><button class="add-btn">اضف</button></a>--}}
        @foreach($animes as $anime)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="get" action="{{route("admin.animes.enable", $anime->id)}}">
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
                <a href="{{route("admin.animes.edit", $anime->id)}}">
                    <button type="button" class="btn-edit">تعديل</button>
                </a>
                <button type="submit" class="btn-edit">الغاء الحظر</button>
            </form>
        @endforeach
        {{ $animes->links() }}
    </div>
@endsection
