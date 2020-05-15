@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{isset($id) ? route("admin.sources.update", $id) : route("admin.sources.store")}}">
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
            <label for="name">الاسم:</label>
            <input placeholder="اكتب اسم المصدر..." type="text" name="name" required value="{{isset($name) ? $name : ""}}" autofocus>
        </div>
        <div class="input-container">
            <label for="type_id">نوع المصدر:</label>
            <select name="type_id" id="">
                @foreach($types as $type)
                    <option value="{{$type->id}}" {{isset($type_id) && $type_id == $type->id ? 'selected' : ""}}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>
            <div class="input-container">
                <label for="link">الرابط:</label>
                <input placeholder="اكتب رابط المصدر..." type="text" name="link" required value="{{isset($link) ? $link : ""}}" autofocus>
            </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
