@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{route("admin.policy.action")}}">
        @method('PUT')
        @csrf
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="input-container">
            <label for="policy_title">العنوان:</label>
            <input placeholder="اكتب عنوان الرسالة..." type="text" name="policy_title" value="{{$policy_title}}" autofocus>
        </div>
        <div class="input-container">
            <label for="policy_content">المحتوي:</label>
            <textarea placeholder="اكتب محتوي الرسالة..." name="policy_content">{{$policy_content}}</textarea>
        </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
