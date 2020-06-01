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
        @foreach($genres as $genre)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="get" action="{{route("admin.genres.enable", $genre->id)}}">
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">التصنيف بالعربية:</label>
                    @endif
                    <input disabled type="text" name="name" value="{{$genre->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name_en">التصنيف باالنجليزية:</label>
                    @endif
                    <input disabled type="text" name="name_en" value="{{$genre->name_en}}" autofocus>
                </div>
                <a href="{{route("admin.genres.edit", $genre->id)}}">
                    <button type="button" class="btn-edit">تعديل</button>
                </a>
                @can("unban animes")
                    <button type="submit" class="btn-edit">الغاء الحظر</button>
                @endcan
            </form>
        @endforeach
        {{ $genres->links() }}
    </div>
@endsection
