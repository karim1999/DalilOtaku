@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{--        <a href="{{route("admin.studios.create")}}"><button class="add-btn">اضافة منتج جديد</button></a>--}}
        @foreach($studios as $studio)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.studios.destroy", $studio->id)}}">
                @method('DELETE')
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">اسم المنتج بالعربية:</label>
                    @endif
                    <input disabled type="text" name="description" value="{{$studio->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name_en">اسم المنتج بالانجليزية:</label>
                    @endif
                    <input disabled type="text" name="name" value="{{$studio->name_en}}" autofocus>
                </div>
                <a href="{{route("admin.studios.edit", $studio->id)}}">
                    @can("edit studios")
                        <button type="button" class="btn-edit">تعديل</button>
                    @endcan
                </a>
                @can("delete studios")
                    <button type="submit" class="btn-delete">حذف</button>
                @endcan
            </form>
        @endforeach
        {{$studios->links()}}
    </div>
@endsection
