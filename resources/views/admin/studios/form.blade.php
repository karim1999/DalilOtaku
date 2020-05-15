@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{isset($id) ? route("admin.studios.update", $id) : route("admin.studios.store")}}">
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
            <label for="name_en">المنتج بالانجليزية:</label>
            <input placeholder="اكتب المنتج بالانجليزية..." type="text" name="name_en" required value="{{isset($name_en) ? $name_en : ""}}" autofocus>
        </div>
        <div class="input-container">
            <label for="name_ar">المنتج بالعربية:</label>
            <input placeholder="اكتب المنتج بالعربية..." type="text" name="name" required value="{{isset($name) ? $name : ""}}">
        </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
