@extends('layouts.main')
@section('title', 'سياسة الحصوصية')

@section('content')
    <div class="content">
        <div class="col-7 col-md-10 box">
            <h4 class="unique2 text-center">{{$policy_title}}</h4>
            <p>{{$policy_content}}</p>
        </div>
    </div>
@endsection
