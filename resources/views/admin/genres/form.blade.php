@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{isset($id) ? route("admin.genres.update", $id) : route("admin.genres.store")}}">
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
            <label for="name_en">التصنيف بالانجليزية:</label>
            <input placeholder="اكتب التصنيف بالانجليزية..." type="text" name="name_en" required value="{{isset($name_en) ? $name_en : ""}}" autofocus>
        </div>
        <div class="input-container">
            <label for="name_ar">التصنيف بالعربية:</label>
            <input placeholder="اكتب التصنيف بالعربية..." type="text" name="name" required value="{{isset($name) ? $name : ""}}">
        </div>
        <div class="input-container">
            <label for="description_en">الوصف بالانجليزية:</label>
            <textarea placeholder="اكتب الوصف بالانجليزية..." required name="description_en">{{isset($description_en) ? $description_en : ""}}</textarea>
        </div>
        <div class="input-container">
            <label for="description">الوصف بالعربية:</label>
            <textarea placeholder="اكتب الوصف بالعربية..." required name="description">{{isset($description) ? $description : ""}}</textarea>
        </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
