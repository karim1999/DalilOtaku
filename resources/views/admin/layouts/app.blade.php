<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @include('admin.partials.header')
</head>
<body>
<div class="main-container">
    @include('admin.partials.menu')
    @yield('content')
    @include('admin.partials.footer')
</div>
</body>
</html>
