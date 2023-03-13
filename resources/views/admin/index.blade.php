@extends('layouts.admin')

@section('content')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> Dashboard </h2>
        <div>
            <a href="#" class="btn btn-primary">Create Analytics Report</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-info-light">
                        <i class="text-primary bi bi-file-earmark-post" style="font-size: xxx-large"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Posts</h6>
                        <span>{{ isset($postCount) ? $postCount : 0 }}</span>
                    </div>
                </article>
            </div> <!-- card end -->
        </div> <!-- col end -->
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light">
                        <i class="text-success bi bi-clipboard-check" style="font-size: xxx-large"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Categories</h6>
                        <span>{{ isset($categoryCount) ? $categoryCount : 0 }}</span>
                    </div>
                </article>
            </div> <!-- card end -->
        </div> <!-- col end -->
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light">
                        <i class="text-warning bi bi-envelope-at" style="font-size: xxx-large"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Newsletter Subscribers</h6>
                        <span>{{ isset($subscriberCount) ? $subscriberCount : 0 }}</span>
                    </div>
                </article>
            </div> <!-- card end -->
        </div> <!-- col end -->
    </div> <!-- row end -->

    <div class="card mb-4">
        <div class="card-header">
            <h6>Recent post views</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sessipn id</th>
                            <th>URI</th>
                            <th>IP</th>
                            <th>Country</th>
                            <th>Browser</th>
                            <th>Operating System</th>
                            <th>Device Type</th>
                            <th>User id</th>
                            <th class="text-end">Post id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($analytics as $metric)
                        <tr>
                            <td>{{ $metric->session }}</td>
                            <td>{{ $metric->uri }}</td>
                            <td>{{ $metric->ip }}</td>
                            <td>{{ $metric->country }}</td>
                            <td>{{ $metric->browser }}</td>
                            <td>{{ $metric->os }}</td>
                            <td>{{ $metric->meta }}</td>

                            <td>
                                @if($metric->user_id != null)
                                <span class="badge rounded-pill bg-success">
                                    {{ $metric->user_id }}
                                </span>
                                @else
                                <span class="badge rounded-pill bg-warning">
                                    Guest
                                </span>
                                @endif
                            </td>
                            <td class="text-end">{{ $metric->post_id }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- table-responsive end -->
        </div>
    </div>
</section>
@endsection