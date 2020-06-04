<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ isset($settings) ? $settings['title']->value : \App\Setting::getOption("title") }} - @yield('title', 'الرئيسية')</title>
<meta name="description"
      content="@yield('description', 'موقع انميات')"></head>
<link rel="icon" href="{{isset($settings) ? $settings['icon']->getFirstMediaUrl('icon') : \App\Setting::getOption("icon", false)->getFirstMediaUrl('icon')}}" type="image/gif" sizes="16x16">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('scripts')

<!-- Styles -->
@if(\Illuminate\Support\Facades\Cookie::get('theme') == "dark")
    <link href="{{ asset('css/dark.css') }}" rel="stylesheet">
@else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endif
@yield('styles')
