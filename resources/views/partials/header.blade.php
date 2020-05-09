<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'دليل اوتاكو') }} - @yield('title', 'الرئيسية')</title>
<meta name="description"
      content="@yield('description', 'موقع انميات')"></head>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('scripts')

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@yield('styles')
