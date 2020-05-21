@extends('layouts.main')
@section('title', 'من نحن')
@section('description', 'موقع انميات')

@section('content')
    <div class="content">
        <div class="col-7 col-md-10 box">
            <h4 class="unique2 text-center">{{$who_title}}</h4>
            <p>{{$who_content}}</p>
        </div>
    </div>
@endsection
