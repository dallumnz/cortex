@extends('layouts.app')

@section('content')
<!-- page intro  -->
<header class="py-5 bg-light border-bottom mb-4"
    style="background-image: url({{ asset('storage/images/theme/home.jpg') }})">
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
                        {{ $featured->created_at->format(setting('long-date-format')) }}
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
                                {{ $headline->created_at->format(setting('short-date-format')) }}
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
                                {{ $post->created_at->format(setting('short-date-format')) }}
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
            @include('guest.widgets.static-pages')
        </div>
    </div>
</div>
@endsection