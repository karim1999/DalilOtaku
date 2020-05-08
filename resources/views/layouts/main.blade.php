<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @include('partials.header')
</head>
<body>
    <div class="main-container">
        @include('partials.nav')
        @yield('content')
        @include('partials.footer')
    </div>
</body>
</html>
