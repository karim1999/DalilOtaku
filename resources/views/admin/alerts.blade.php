@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{route("admin.alert.action")}}">
        @method('PUT')
        @csrf
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="input-container">
            <label for="welcome_title">العنوان:</label>
            <input placeholder="اكتب عنوان الرسالة..." type="text" name="welcome_title" value="{{$welcome_title}}" autofocus>
        </div>
        <div class="input-container">
            <label for="welcome_link">رابط:</label>
            <input placeholder="اكتب عنوان الرابط..." type="text" name="welcome_link" value="{{$welcome_link}}">
        </div>
        <div class="input-container">
            <label for="welcome_content">المحتوي:</label>
            <textarea placeholder="اكتب محتوي الرسالة..." name="welcome_content">{{$welcome_content}}</textarea>
        </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
