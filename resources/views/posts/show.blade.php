@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">{{ $post->title }}</h2>
        <div>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-danger">
                &times; {{__('app.common.cancel')}}
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <p class="card-text">Created by: {{ $user->name }}</p>
            <p class="card-text">Created at: {{ $post->created_at->diffForHumans() }}</p>
            <p class="card-text">{{ $post->description }}</p>
            <p class="card-text">{{ $category->name }} / {{ $subcategory->name }}</p>
            <p class="card-text">Keywords: {{ $post->keywords }}</p>
            <p class="card-text">Tags: {{ $post->tags }}</p>
            <p class="card-text">{{ $article->content }}</p>
        </div>
    </div> <!-- card end -->

</section> <!-- content-main end -->
@endsection