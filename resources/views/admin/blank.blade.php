@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Blank </h2>
        <div>
            <a href="{{ url('/') }}" class="btn btn-outline-danger"> &times; {{
                __('app.common.create') }}</a>
            {{-- <a href="{{ route('/') }}" class="btn btn-outline-danger"> &times; {{ __('app.common.cancel')
                }}</a> --}}
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <p class="card-text">Content here</p>
        </div>
    </div> <!-- card end -->

</section> <!-- content-main end -->
@endsection