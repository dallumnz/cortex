@extends('layouts.app')

@section('content')
<!-- page intro  -->
<header class="py-5 bg-light border-bottom mb-4"
    style="background-image: url({{ asset('storage/images/theme/banner.jpg') }}); background-position-y: bottom;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder text-white">{{ $subcategory->name }}</h1>
            <p class="lead mb-0 text-white">All related posts</p>
        </div>
    </div>
</header>
<!-- section main -->
<div class="container">
    @include('system.notification')
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Nested row for non-featured blog posts-->
            @if(count($posts, COUNT_RECURSIVE) > 0)
            @foreach($posts as $post)
            <!-- Blog post-->
            <div class="card mb-4">
                <a href="{{ route('post.show', $post->slug) }}"><img class="card-img-top"
                        src="{{ asset($post->post_image) }}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <i class="bi bi-calendar"></i>
                        {{ $post->created_at->format(setting('short-date-format')) }}
                    </div>
                    <div class="small text-muted">
                        <a class="badge bg-primary text-decoration-none link-light">
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
            @endforeach
            @else
            <div class="card mb-4">
                <a href="{{ route('app.index') }}">
                    <img class="card-img-top" src="{{ asset('storage/images/theme/post.jpg') }}" alt="..." />
                </a>
                <div class="card-body">
                    <h2 class="card-title">No posts</h2>
                    <p class="card-text">Unfortunately there are no posts in this category. We are adding new content
                        all the time, so please check back later. </p>
                    <a class="btn btn-primary" href="{{ route('app.index') }}">Go Back</a>
                </div>
            </div>
            @endif
        </div>
        <!-- Pagination-->
        {{--<nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                        aria-disabled="true">Newer</a>
                </li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                <li class="page-item"><a class="page-link" href="#!">15</a></li>
                <li class="page-item"><a class="page-link" href="#!">Older</a></li>
            </ul>
        </nav>--}}
        <!-- Side widgets-->
        <div class="col-lg-4">
            @include('guest.widgets.categories')
            @include('guest.widgets.search')
            @include('guest.widgets.newsletter')
        </div>
    </div>
</div>
@endsection