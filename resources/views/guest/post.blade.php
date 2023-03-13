@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                @include('guest.partials.post-header')
                <!-- Preview image figure-->
                <figure class="mb-4">
                    <img class="img-fluid rounded" src="{{ asset($post->post_image) }}" alt="..." />
                </figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="text-lead">{{ $post->description }}</p>
                    @markdown($article->content)
                </section>
            </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            @include('guest.widgets.categories')
            @include('guest.widgets.search')
            @include('guest.widgets.newsletter')
        </div>
    </div>
</div>
@endsection