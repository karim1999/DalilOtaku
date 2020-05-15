@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a href="{{route("admin.categories.create")}}"><button class="add-btn">اضافة تصنيف جديد</button></a>
        @foreach($categories as $category)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.categories.destroy", $category->id)}}">
                @method('DELETE')
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">التصنيف:</label>
                    @endif
                    <input disabled placeholder="اكتب اسم التصنيف بالعربية..." type="text" name="name" value="{{$category->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="description">الوصف:</label>
                    @endif
                    <input disabled placeholder="اكتب اسم الوصف بالعربية..." type="text" name="description" value="{{$category->description}}" autofocus>
                </div>
                <a href="{{route("admin.categories.edit", $category->id)}}">
                    <button type="button" class="btn-edit">تعديل</button>
                </a>
                <button type="submit" class="btn-delete">حذف</button>
            </form>
        @endforeach
    </div>
@endsection
