@extends('layouts.main')

@section('content')
    <div class="content login-form">
        <img class="logo" src="{{asset("assets/logo.png")}}" alt="">
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <h4 class="unique2">تغيير كلمة المرور</h4>
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-container">
                <input placeholder="البريد الالكتروني..." type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <img src="{{asset("assets/icons2/001-arroba.svg")}}" alt="">
            </div>
            @error('email')
            <h6 class="unique text-right no-padding">{{ $message }}</h6>
            @enderror
            <div class="input-container">
                <input placeholder="كلمة المرور..." type="password"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <img src="{{asset("assets/icons2/008-lock.svg")}}" alt="">
            </div>
            @error('password')
            <h6 class="unique text-right no-padding">{{ $message }}</h6>
            @enderror
            <div class="input-container">
                <input placeholder="كلمة المرور..." type="password"  class="@error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                <img src="{{asset("assets/icons2/008-lock.svg")}}" alt="">
            </div>

            <button class="submit-button" type="submit">
                تغيير كلمة المرور
            </button>
        </form>
    </div>
@endsection
