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
            {{-- <h5class="card-title">Alttable</h5> --}}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Date Created</th>
                            <th>Visibility</th>
                            <th>Show Breadcrumb</th>
                        </thead>
                        <tr>
                            <td><b>Page Title</b></td>
                            <td>page-title-slug</td>
                            <td>07/05/2020</td>
                            <td>
                                <span class="badge rounded-pill bg-success">Active</span>
                                <span class="badge rounded-pill bg-danger">Inactive</span>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-success">True</span>
                                <span class="badge rounded-pill bg-danger">False</span>
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">Detail</a>
                                <div class="btn-group dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i
                                            class="bi bi-pen-fill"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div> <!-- dropdown end -->
                            </td>
                        </tr>
                        <tr>
                            <td><b>Page Title</b></td>
                            <td>page-title-slug</td>
                            <td>07/05/2020</td>
                            <td><span class="badge rounded-pill bg-success">Active</span></td>
                            <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">Detail</a>
                                <div class="btn-group dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i
                                            class="bi bi-pen-fill"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div> <!-- dropdown end -->
                            </td>
                        </tr>
                        <tr>
                            <td><b>Page Title</b></td>
                            <td>page-title-slug</td>
                            <td>07/05/2020</td>
                            <td><span class="badge rounded-pill bg-success">Active</span></td>
                            <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">Detail</a>
                                <div class="btn-group dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i
                                            class="bi bi-pen-fill"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div> <!-- dropdown end -->
                            </td>
                        </tr>

                    </table>
                </div> <!-- table-responsive end// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    @endsection