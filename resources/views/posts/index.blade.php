@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Posts</h2>
        <div>
            <a href="{{ route('post_format') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
                Create new
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            @foreach ($posts as $post )
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                        <a class="itemside" href="{{ route('posts.edit', $post->id) }}">
                            <div class="left">
                                <img src="{{ asset($post->post_image) }}" class="img-sm img-thumbnail" alt="Post Image">
                            </div>
                            <div class="info">
                                <h6 class="mb-0">{{ $post->title }}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        <span>{{ $post->user->name }}</span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-price">
                        @if ($post->status)
                        <span class="badge rounded-pill bg-success">Published</span>
                        @else
                        <span class="badge rounded-pill bg-danger">Draft</span>
                        @endif
                        @if ($post->visibility)
                        <span class="badge rounded-pill bg-info">Public</span>
                        @else
                        <span class="badge rounded-pill bg-warning">Private</span>
                        @endif
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        @if ($post->featured)
                        <span class="badge rounded-pill bg-success">Featured</span>
                        @endif
                        @if ($post->breaking)
                        <span class="badge rounded-pill bg-danger">Breaking</span>
                        @endif
                        @if ($post->recommended)
                        <span class="badge rounded-pill bg-info">Recommended</span>
                        @endif
                        @if ($post->headline)
                        <span class="badge rounded-pill bg-warning">Headline</span>
                        @endif

                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-action">
                        <div class="dropdown float-end">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('posts.show', $post->id) }}">
                                    Show preview
                                </a>
                                <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">
                                    Edit
                                </a>
                                <a class="dropdown-item text-danger" href="{{ route('posts.destroy', $post->id) }}">
                                    Delete
                                </a>
                            </div>
                        </div> <!-- dropdown -->
                    </div>
                </div> <!-- row -->
            </article> <!-- itemlist -->
            @endforeach

            {{--<nav class="float-end mt-4" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>--}}

        </div> <!-- card-body end -->
    </div> <!-- card end -->
</section> <!-- content-main end -->
@endsection