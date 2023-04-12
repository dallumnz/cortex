<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @if(! empty($post))
    {!! seo()->for($post)!!}
    @else
    {!! seo()!!}
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/js/app.js'])

    @include('layouts.partials.analytics')
</head>

<body>
    @include('layouts.partials.header')
    <!-- section-content -->
    @yield('content')
    <!-- section content end -->
    @include('layouts.partials.footer')
</body>

</html>