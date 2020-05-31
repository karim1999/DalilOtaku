@extends('layouts.app')

@section('content')
<div class="content login-form">
    <img class="logo" src="{{asset("assets/logo.png")}}" alt="">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <h4 class="unique2">تسجيل الدخول</h4>
{{--        <ul class="horizontal-list">--}}
{{--            <li><img src="{{asset("assets/social/twitter.png")}}" alt=""></li>--}}
{{--            <li><img src="{{asset("assets/social/gmail.png")}}" alt=""></li>--}}
{{--            <li><img src="{{asset("assets/social/facebook.png")}}" alt=""></li>--}}
{{--        </ul>--}}
{{--        <h5 class="text-center">او من خلال الحساب التقليدي</h5>--}}
        <div class="input-container">
            <input placeholder="البريد الالكتروني..." type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <img src="{{asset("assets/icons2/001-arroba.svg")}}" alt="">
        </div>
        @error('email')
            <h6 class="unique text-right no-padding">{{ $message }}</h6>
        @enderror
        <div class="input-container">
            <input placeholder="كلمة المرور..." type="password"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <img src="{{asset("assets/icons2/008-lock.svg")}}" alt="">
        </div>
        @error('password')
            <h6 class="unique text-right no-padding">{{ $message }}</h6>
        @enderror
        <h5 class="text-right"><a class="no-decoration" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a></h5>
        <button class="submit-button" type="submit">
            تسجيل
        </button>
    </form>
    <h4 class="text-center">ليس لديك حساب؟ <a href="{{ route('register') }}" class="unique no-decoration">انشئ حساب مجانا</a></h4>
</div>
@endsection
