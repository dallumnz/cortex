@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">Mail</h2>
        <div>
            <a href="{{--  --}}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
                Create new
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>
                            <th>Subject</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Devon Lane</td>
                            <td>Administrator</td>
                            <td>10.03.2020</td>
                            <td><b>Contact Form Submission</b></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">View</a>&nbsp;
                                <div class="dropdown float-end">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light" aria-expanded="false">
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <div class="dropdown-menu" style="margin: 0px;">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div>
                                <!-- dropdown end -->
                            </td>
                        </tr>
                        <tr>
                            <td>Guy Hawkins</td>
                            <td>Administrator</td>
                            <td>04.12.2019</td>
                            <td><b>Contact Form Submission</b></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">View</a>&nbsp;
                                <div class="dropdown float-end">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div>
                                <!-- dropdown end -->
                            </td>
                        </tr>
                        <tr>
                            <td>Savannah Nguyen</td>
                            <td>Administrator</td>
                            <td>25.05.2020</td>
                            <td><b>Contact Form Submission</b></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">View</a>&nbsp;
                                <div class="dropdown float-end">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div>
                                <!-- dropdown end -->
                            </td>
                        </tr>
                        <tr>
                            <td>Esther Howard</td>
                            <td>Administrator</td>
                            <td>01.06.2020</td>
                            <td><b>New User Registration</b></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">View</a>&nbsp;
                                <div class="dropdown float-end">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div>
                                <!-- dropdown end -->
                            </td>
                        </tr>
                        <tr>
                            <td>Jane Cooper</td>
                            <td>Administrator</td>
                            <td>13.03.2020</td>
                            <td><b>Contact Form Submission</b></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">View</a>&nbsp;
                                <div class="dropdown float-end">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div>
                                <!-- dropdown end -->
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div> <!-- table-responsive end -->

        </div> <!-- card-body end -->
    </div> <!-- card end -->
</section> <!-- content-main end -->
@endsection