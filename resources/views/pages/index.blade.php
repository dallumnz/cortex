@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Static Pages</h2>
        <div>
            <a href="{{ route('pages.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i> {{__('app.common.create') }}
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            @foreach($pages as $page)
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                        <a class="itemside" href="{{ route('pages.edit', $page->id) }}">
                            <div class="left">
                                <h6 class="mb-0">{{ $page->title }}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        @if ($page->status)
                        <span class="badge rounded-pill bg-success">Published</span>
                        @else
                        <span class="badge rounded-pill bg-danger">Draft</span>
                        @endif
                        @if ($page->visibility)
                        <span class="badge rounded-pill bg-info">Public</span>
                        @else
                        <span class="badge rounded-pill bg-warning">Private</span>
                        @endif
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-action">
                        <div class="dropdown float-end">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('page.show', $page->id) }}">
                                    Show preview
                                </a>
                                <a class="dropdown-item" href="{{ route('pages.edit', $page->id) }}">
                                    Edit
                                </a>
                                <a class="dropdown-item text-danger" href="{{ route('pages.destroy', $page->id) }}">
                                    Delete
                                </a>
                            </div>
                        </div> <!-- dropdown -->
                    </div>
                </div> <!-- row -->
            </article> <!-- itemlist -->
            @endforeach
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    @endsection