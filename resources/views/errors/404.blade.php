@extends('layouts.app')

@section('content')
    <style>
        .mainbox {
            margin: auto;
            height: 600px;
            width: 600px;
            position: relative;
        }

        .err {
            /*color: #ffffff;*/
            font-family: 'Nunito Sans', sans-serif;
            font-size: 11rem;
            position:absolute;
            left: 20%;
            top: 8%;
        }

        .far {
            position: absolute;
            font-size: 8.5rem;
            left: 42%;
            top: 15%;
            /*color: #ffffff;*/
        }

        .err2 {
            /*color: #ffffff;*/
            font-family: 'Nunito Sans', sans-serif;
            font-size: 11rem;
            position:absolute;
            left: 68%;
            top: 8%;
        }

        .msg {
            text-align: center;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 1.6rem;
            position:absolute;
            left: 16%;
            top: 45%;
            width: 75%;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="mainbox">
        <div class="err">4</div>
        <i class="far fa-question-circle fa-spin"></i>
        <div class="err2">4</div>
        <div class="msg"> الصفحة التي تبحث عنها غير موجودة.<br> <a href="#">اضغط هنا للذهاب للرئيسية</a>
            <br>
            <img style="margin-top: 20px" src="{{asset('assets/logo.png')}}" alt="">
        </div>
    </div>
@endsection
