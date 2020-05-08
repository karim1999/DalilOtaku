@extends('layouts.app')

@section('content')
    <div class="content login-form">
        <img class="logo" src="{{asset("assets/logo.png")}}" alt="">
        <form action="{{ route('password.confirm') }}" method="post">
            @csrf
            <h4 class="unique2">تأكييد كلمة المرور</h4>
            <div class="input-container">
                <input placeholder="كلمة المرور..." type="password"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <img src="{{asset("assets/icons2/008-lock.svg")}}" alt="">
            </div>
            @error('password')
            <h6 class="unique text-right no-padding">{{ $message }}</h6>
            @enderror
            <h5 class="text-right"><a class="no-decoration" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a></h5>
            <button class="submit-button" type="submit">
                تأكييد كلمة المرور
            </button>
        </form>
    </div>
@endsection
