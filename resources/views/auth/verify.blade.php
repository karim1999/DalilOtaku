@extends('layouts.app')

@section('content')
    <div class="content login-form">
        <img class="logo" src="{{asset("assets/logo.png")}}" alt="">
        <form action="{{ route('verification.resend') }}" method="post">
            @if (session('resent'))
                <div class="alert-success" role="alert">
                    "تم ارسال ايميل جديد"
                </div>
            @endif
            @csrf
            <h4 class="unique2">تفعيل البريد الالكتروني</h4>
            <button class="submit-button" type="submit">
                تفعيل البريد الالكتروني
            </button>
        </form>
    </div>
@endsection
