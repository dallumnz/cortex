@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Edit Static Page </h2>
        <div>
            <a href="{{ route('pages.index') }}" class="btn btn-outline-danger">{{ __('app.common.cancel') }}</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('pages.update', $page->id) }}">
                @csrf
                <div class="mb-4">
                    <label for="title" class="form-label">Page title</label>
                    <input type="text" placeholder="Type here" class="form-control" name="title"
                        value="{{ $page['title'] }}">
                </div>
                <div class="mb-4">
                    <label for="title" class="form-label">Page description</label>
                    <textarea type="text" placeholder="Type here" class="form-control"
                        name="description">{{ $page['description'] }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="title" class="form-label">Page content</label>
                    <textarea type="text" placeholder="Type here" class="form-control" name="content"
                        rows="5">{{ $page['content'] }}</textarea>
                </div>
                <div class="row gx-2">
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Publish</label>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="status" @if ($page['status']) checked
                                @endif>
                            <span class="form-check-label"> Publish on website </span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Visibility</label>
                        <select class="form-select" name="visibility">
                            @if ($page->visibility )
                            <option value="1" selected> Public </option>
                            <option value="0"> Private </option>
                            @else
                            <option value="1"> Public </option>
                            <option value="0" selected> Private </option>
                            @endif
                        </select>
                    </div>
                </div> <!-- row -->

                <button class="btn btn-primary" type="submit">Submit item</button>

            </form>
        </div>
    </div> <!-- card end -->
</section> <!-- content-main end -->
@endsection