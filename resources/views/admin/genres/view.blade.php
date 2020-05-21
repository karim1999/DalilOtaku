@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
{{--        <a href="{{route("admin.genres.create")}}"><button class="add-btn">اضافة تصنيف جديد</button></a>--}}
        @foreach($genres as $genre)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.genres.destroy", $genre->id)}}">
                @method('DELETE')
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">التصنيف:</label>
                    @endif
                    <input disabled type="text" name="name" value="{{$genre->name}}">
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="description">التصنيف بالانجليزية:</label>
                    @endif
                    <input disabled type="text" name="description" value="{{$genre->name_en}}">
                </div>
                <a href="{{route("admin.genres.edit", $genre->id)}}">
                    <button type="button" class="btn-edit">تعديل</button>
                </a>
                <button type="submit" class="btn-delete">حظر</button>
            </form>
        @endforeach
        {{$genres->links()}}
    </div>
@endsection
