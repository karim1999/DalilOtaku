@extends('layouts.main')

@section('content')
<div class="content">
    <form action="" method="post">
        <h4 class="unique2">اتصل بنا</h4>
        <div class="input-container">
            <input placeholder="الاسم..." type="text">
            <img src="{{asset("assets/icons2/002-search.svg")}}" alt="">
        </div>
        <div class="input-container">
            <input placeholder="البريد الالكتروني..." type="text">
            <img src="{{asset("assets/icons2/001-arroba.svg")}}" alt="">
        </div>
        <div class="input-container">
            <textarea placeholder="محتوي الرسالة..."></textarea>
        </div>
        <button class="submit-button" type="submit">
            أرسل
        </button>
    </form>
</div>
@endsection
