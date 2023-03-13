<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Dallum Brown">
    <meta name="description" content="dalbro development environment">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/images/icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/images/icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/images/icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/images/icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/images/icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/images/icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/images/icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/images/icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/images/icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/images/icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/images/icons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/images/icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/js/app.js'])
</head>

<body>
    <!-- nav start -->
    @include('layouts.partials.header')
    <!-- nav end -->

    <!-- page intro  -->
    <header class="py-5 bg-light border-bottom mb-4"
        style="background-image: url({{ asset('images/theme/home.jpg') }})">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder text-white">trlpht industries</h1>
                <p class="lead mb-0 text-white">Your success is our mission.</p>
            </div>
        </div>
    </header>
    <!-- section main -->
    <div class="container">
        @include('system.notification')
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="{{ route('post.show', $featured->slug) }}">
                        <img class="card-img-top" src="{{ asset($featured->post_image) }}" alt="Featured post image" />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <i class="bi bi-calendar"></i>
                            {{ $featured->created_at->format('d M Y') }}
                        </div>
                        <span class="badge bg-primary text-decoration-none link-light"> Featured </span>
                        <span class="badge bg-primary text-decoration-none link-light">
                            {{ $featured->category->name }}
                        </span>
                        <h2 class="card-title">{{ $featured->title }}</h2>
                        <p class="card-text">{{ $featured->description }}</p>
                        <a class="btn btn-primary" href="{{ route('post.show', $featured->slug) }}">Read more</a>
                    </div>
                </div>
                <!-- Nested row for headline blog posts -->
                <div class="row">
                    @foreach($headlines as $headline)
                    <div class="col-lg-6">
                        <!-- Blog post -->
                        <div class="card mb-4">
                            <a href="{{ route('post.show', $headline->slug) }}">
                                <img class="card-img-top" src="{{ asset($headline->post_image) }}" alt="..." />
                            </a>
                            <div class="card-body">
                                <div class="small text-muted">
                                    <i class="bi bi-calendar"></i>
                                    {{ $headline->created_at->format('d M Y') }}
                                </div>
                                <div class="small text-muted">
                                    <span class="badge bg-primary text-decoration-none link-light"> Headline </span>
                                    <a class="badge bg-primary text-decoration-none link-light"
                                        href="{{ route('post.category', $headline->category->slug) }}">
                                        {{ $headline->category->name }}
                                    </a>
                                    <a class="badge bg-secondary text-decoration-none link-light">
                                        {{ $headline->subcategory->name }}
                                    </a>
                                </div>

                                <h2 class="card-title h4">{{ $headline->title }}</h2>
                                <p class="card-text">{{ $headline->description }}</p>
                                <a class="btn btn-primary" href="{{ route('post.show', $headline->slug) }}">Read
                                    more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Nested row for recommended blog posts -->
                <div class="row">
                    @foreach($recommended as $post)
                    <div class="col-lg-6">
                        <!-- Blog post -->
                        <div class="card mb-4">
                            <a href="{{ route('post.show', $post->slug) }}"><img class="card-img-top"
                                    src="{{ asset($post->post_image) }}" alt="Recommended post image" /></a>
                            <div class="card-body">
                                <div class="small text-muted">
                                    <i class="bi bi-calendar"></i>
                                    {{ $post->created_at->format('d M Y') }}
                                </div>
                                <div class="small text-muted">
                                    <span class="badge bg-primary text-decoration-none link-light"> Recommended </span>
                                    <a class="badge bg-primary text-decoration-none link-light"
                                        href="{{ route('post.category', $post->category->slug) }}">
                                        {{ $post->category->name }}
                                    </a>
                                    <a class="badge bg-secondary text-decoration-none link-light">
                                        {{ $post->subcategory->name }}
                                    </a>
                                </div>

                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                <p class="card-text">{{ $post->description }}</p>
                                <a class="btn btn-primary" href="{{ route('post.show', $post->slug) }}">Read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination-->
                {{--<nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                                aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>--}}
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                @include('guest.widgets.search')
                @include('guest.widgets.categories')
                @include('guest.widgets.newsletter')
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
</body>

</html>