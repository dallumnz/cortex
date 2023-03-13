@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Newsletter Subscribers </h2>
        <div>
            <a href="{{ route('admin.index') }}" class="btn btn-outline-danger"> &times;
                {{ __('app.common.cancel')}}
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            @foreach($newsletters as $subscriber)
            <article class="itemlist">
                <div class="row align-items-center">

                    <div class="col-lg-8 col-sm-10 flex-grow-1">
                        <div class="info">
                            <h6 class="mb-0">{{ $subscriber->email }}</h6>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        @if ($subscriber->status == 1)
                        <span class="badge rounded-pill bg-warning">Subscribed</span>
                        @else
                        <span class="badge rounded-pill bg-danger">Unsubscribed</span>
                        @endif

                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-action">
                        <div class="dropdown float-end">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-danger"
                                    href="{{ route('newsletters.destroy', $subscriber->id) }}">
                                    Delete
                                </a>
                            </div>
                        </div> <!-- dropdown -->
                    </div>

                </div> <!-- row -->
            </article>
            @endforeach
        </div>
    </div> <!-- card end -->

</section> <!-- content-main end -->
@endsection