@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Static Page content-->
            <article>
                @include('guest.partials.page-header')
                <!-- Preview image figure-->
                <figure class="mb-4">
                    <img class="img-fluid rounded" src="{{-- asset() --}}" alt="..." />
                </figure>
                <!-- Page content-->
                <section class="mb-5">
                    <p class="text-lead">{{ $page->description }}</p>
                    @markdown($page->content)
                </section>
            </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            {{--
            @include('guest.widgets.categories')
            @include('guest.widgets.search')
            @include('guest.widgets.newsletter')
            --}}
        </div>
    </div>
</div>
@endsection