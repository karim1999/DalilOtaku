@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        <div id="anime">
            <button v-promise-btn @click="loadSeasonsAchive">Load Anime</button>
            <pre>
                <code v-for="item in list">
                    <li>@{{ item }}</li>
                </code>
            </pre>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/anime.js') }}" defer></script>
@endsection
