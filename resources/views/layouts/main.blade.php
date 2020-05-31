<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @include('partials.header')
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <script data-ad-client="ca-pub-8255238796501712" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
    <div class="main-container">
        @include('partials.nav')
        @yield('content')
        @include('partials.footer')
    </div>
</body>
</html>
