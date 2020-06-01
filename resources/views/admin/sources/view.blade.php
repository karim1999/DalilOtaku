@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        @can("add sources")
            <a href="{{route("admin.sources.create")}}"><button class="add-btn">اضف</button></a>
        @endcan
        @foreach($sources as $source)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.sources.destroy", $source->id)}}">
                @method('DELETE')
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="type_id">نوع المصدر:</label>
                    @endif
                    <input disabled type="text" name="type_id" value="{{$source->type->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">اسم المصدر:</label>
                    @endif
                    <input disabled type="text" name="name" value="{{$source->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="link">رابط المصدر:</label>
                    @endif
                    <input disabled type="text" name="link" value="{{$source->link}}" autofocus>
                </div>
                <a href="{{route("admin.sources.edit", $source->id)}}">
                    @can("edit sources")
                        <button type="button" class="btn-edit">تعديل</button>
                    @endcan
                </a>
                @can("delete sources")
                    <button type="submit" class="btn-delete">حذف</button>
                @endcan
            </form>
        @endforeach
    </div>
@endsection
