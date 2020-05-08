@extends('layouts.app')

@section('content')
    <div class="content login-form">
        <img class="logo" src="{{asset("assets/logo.png")}}" alt="">
        <form action="{{ route('password.email') }}" method="post">
            @if (session('status'))
                <div class="alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @csrf
            <h4 class="unique2">تغيير كلمة المرور</h4>
            <div class="input-container">
                <input placeholder="البريد الالكتروني..." type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <img src="{{asset("assets/icons2/001-arroba.svg")}}" alt="">
            </div>
            @error('email')
            <h6 class="unique text-right no-padding">{{ $message }}</h6>
            @enderror
            <button class="submit-button" type="submit">
                تغيير كلمة المرور
            </button>
        </form>
    </div>
@endsection
