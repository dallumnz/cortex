@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Search results -->
            <article>
                <h1>Search results</h1>
                <p>There are {{ count($results) }} results.</p>
                @foreach($results as $result)
                <h4><a href="{{ route('post.show', $result->slug) }}">{{ $result->title }}</a></h4>
                <p>{{ $result->description }}</p>
                @endforeach
                @if(count($results) == 0)
                <p>Please try again with different terms, or <a href="{{ route('app.index') }}">go back</a>.</p>
                @endif
            </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            @include('guest.widgets.search')
            @include('guest.widgets.newsletter')
        </div>
    </div>
</div>
@endsection