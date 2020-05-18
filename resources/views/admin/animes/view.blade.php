@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        <div id="anime">
            <button v-promise-btn @click="loadAnime">Load Anime</button>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/anime.js') }}" defer></script>
@endsection
