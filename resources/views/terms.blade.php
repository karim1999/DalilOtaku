@extends('layouts.main')
@section('title', 'شروط الاستمخدام')

@section('content')
    <div class="content">
        <div class="col-7 col-md-10 box">
            <h4 class="unique2 text-center">{{$terms_title}}</h4>
            <p>{{$terms_content}}</p>
        </div>
    </div>
@endsection
