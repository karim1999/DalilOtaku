<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ \App\Setting::getOption("title") }} - @yield('title', 'لوحة التحكم')</title>
<meta name="description"
      content="@yield('description', \App\Setting::getOption('description'))"></head>
<link rel="icon" href="{{\App\Setting::getOption("icon", false)->getFirstMediaUrl('icon')}}" type="image/gif" sizes="16x16">

<!-- Scripts -->
@yield('scripts')

<!-- Styles -->
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@yield('styles')
