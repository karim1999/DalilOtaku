@extends('layouts.app')

@section('content')
    <div class="signup-form">
        <div class="promotion">
            <h1>تسجيلك في الموقع يتيح لك العديد من المزايا الرائعة:</h1>
            <ul>
                <li>
                    <i class="fa fa-check-circle"></i>
                    إمكانية الإعجاب بالأنمي.
                </li>
                <li>
                    <i class="fa fa-check-circle"></i>
                    قائمة بالأنميات التي تتابعها حاليًا، تمكنك من معرفة
                    تواريخ عرض الحلقات.
                </li>
                <li>
                    <i class="fa fa-check-circle"></i>
                    قائمة خاصة بالأنميات التي تابتها والتي ستتابعها.
                </li>
                <li>
                    ما الذي تنتظره، سجل مجانًا وابدأ بمنافسة أصدقائك
                    على من شاهد أنميات أكثر :)
                </li>
            </ul>
        </div>
        <div class="content login-form">
            <div class="signup-form-container">
                <img class="logo" src="{{asset("assets/logo.png")}}" alt="">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <h4 class="unique2">انشاء حساب</h4>
                    {{--            <ul class="horizontal-list">--}}
                    {{--                <li><img src="{{asset("assets/social/twitter.png")}}" alt=""></li>--}}
                    {{--                <li><img src="{{asset("assets/social/gmail.png")}}" alt=""></li>--}}
                    {{--                <li><img src="{{asset("assets/social/facebook.png")}}" alt=""></li>--}}
                    {{--            </ul>--}}
                    {{--            <h5 class="text-center">او من خلال البريد الالكتروني</h5>--}}
                    <div class="input-container">
                        <input placeholder="اسم المستخدم..." type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>
                        <img src="{{asset("assets/icons2/027-person.svg")}}" alt="">
                    </div>
                    @error('name')
                    <h6 class="unique text-right no-padding">{{ $message }}</h6>
                    @enderror
                    <div class="input-container">
                        <input placeholder="البريد الالكتروني..." type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <img src="{{asset("assets/icons2/027-person.svg")}}" alt="">
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
                        <input placeholder="تكرار كلمة المرور..." type="password"  class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        <img src="{{asset("assets/icons2/008-lock.svg")}}" alt="">
                    </div>
                    @error('password_conformation')
                    <h6 class="unique text-right no-padding">{{ $message }}</h6>
                    @enderror
                    <h5 class="text-right">بتسجيلك في الموقع انت توافق علي <a class="no-decoration unique" href="{{ route('password.request') }}">شروط الاستحدام</a></h5>
                    <button class="submit-button" type="submit">
                        تسجيل
                    </button>
                </form>
                <h4 class="text-center">هل لديك حساب؟ <a href="{{ route('login') }}" class="unique no-decoration">سجل الدخول اذا!</a></h4>
            </div>
        </div>
    </div>
@endsection
