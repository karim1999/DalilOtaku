@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a href="{{route("admin.genres.create")}}"><button class="add-btn">اضافة تصنيف جديد</button></a>
        @foreach($genres as $genre)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.genres.destroy", $genre->id)}}">
                @method('DELETE')
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">التصنيف:</label>
                    @endif
                    <input disabled placeholder="اكتب اسم التصنيف بالعربية..." type="text" name="name" value="{{$genre->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="description">الوصف:</label>
                    @endif
                    <input disabled placeholder="اكتب اسم الوصف بالعربية..." type="text" name="description" value="{{$genre->description}}" autofocus>
                </div>
                <a href="{{route("admin.genres.edit", $genre->id)}}">
                    <button type="button" class="btn-edit">تعديل</button>
                </a>
                <button type="submit" class="btn-delete">حذف</button>
            </form>
        @endforeach
    </div>
@endsection
