@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Blank </h2>
        <div>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-danger">
                &times; {{ __('app.common.cancel') }}
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <figure class="card border-1">
                    <div class="card-header bg-white text-center">
                        <i class="bi bi-card-text" style="font-size: 72px"></i>
                    </div>
                    <figcaption class="card-body text-center">
                        <h6 class="card-title m-0">Article</h6>
                        <a href="{{ route('post_type',['section' => 'article/create']) }}"> {{ 'Create new' }} </a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div> <!-- card end -->

</section> <!-- content-main end -->
@endsection