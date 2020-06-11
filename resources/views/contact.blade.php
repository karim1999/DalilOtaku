@extends('layouts.main')
@section('title', 'Contact Us')

@section('content')
<div class="content">
    <form action="{{route('contact.send')}}" method="post">
        @csrf
        <h4 class="unique2">اتصل بنا</h4>
        @if (session('status'))
            <div class="alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="input-container">
            <input name="name" placeholder="الاسم..." type="text">
            <img src="{{asset("assets/icons2/002-search.svg")}}" alt="">
        </div>
        <div class="input-container">
            <input name="email" placeholder="البريد الالكتروني..." type="text">
            <img src="{{asset("assets/icons2/001-arroba.svg")}}" alt="">
        </div>
        <div class="input-container">
            <textarea name="content" placeholder="محتوي الرسالة..."></textarea>
        </div>
        <button class="submit-button" type="submit">
            أرسل
        </button>
    </form>
</div>
@endsection
