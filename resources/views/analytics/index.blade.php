@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Analytics</h2>
        <div>
            <a href="{{--  --}}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
                Create new
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            stuff go here

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