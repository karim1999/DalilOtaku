@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{route("admin.terms.action")}}">
        @method('PUT')
        @csrf
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="input-container">
            <label for="terms_title">العنوان:</label>
            <input placeholder="اكتب عنوان الرسالة..." type="text" name="terms_title" value="{{$terms_title}}" autofocus>
        </div>
        <div class="input-container">
            <label for="terms_content">العنوان:</label>
            <textarea placeholder="اكتب محتوي الرسالة..." name="terms_content">{{$terms_content}}</textarea>
        </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
