@extends('layouts.admin')

@section('content')
<section class="content-main">

    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-md-2 col-6">
                    <select class="form-select">
                        <option selected>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end -->

        <div class="card-body">

            @foreach ($users as $user)
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col col-check flex-grow-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                        <a class="itemside" href="#">
                            <div class="left">
                                <img src="{{ asset('images/avatars/avatar.jpg') }}" class="img-sm img-thumbnail"
                                    alt="Item">
                            </div>
                            <div class="info">
                                <h6 class="mb-0">{{ $user->name }}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-date">
                        <span>{{ $user->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-price">
                        @if($user->email_verified_at)
                        <span class="badge rounded-pill bg-success">Verified</span>
                        @else
                        <span class="badge rounded-pill bg-danger">Unverified</span>
                        @endif
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        <span class="badge rounded-pill bg-success">Active</span>
                        <span class="badge rounded-pill bg-danger">Deactive</span>
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-action">
                        <div class="dropdown float-end">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">View detail</a>
                                <a class="dropdown-item" href="#">Edit info</a>
                                <a class="dropdown-item text-danger" href="#">Delete</a>
                            </div>
                        </div> <!-- dropdown -->
                    </div>
                </div> <!-- row -->
            </article> <!-- itemlist  -->
            @endforeach
            {{--
            <nav class="float-end mt-4" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            --}}
        </div> <!-- card-body end -->
    </div> <!-- card end -->

    @endsection