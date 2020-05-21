@extends('layouts.main')
@section('title', 'الاسئلة الشائعة')
@section('description', 'موقع انميات')

@section('content')
    <div id="faq">
        <frequently-questions :questions='@json($questions)' />
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/faq.js') }}" defer></script>
@endsection
