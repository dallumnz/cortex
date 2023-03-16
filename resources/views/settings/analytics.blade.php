@extends('layouts.admin')

@section('content')
<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">Site settings </h2>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row gx-5">
                @include('settings.partials.nav-pills')
                <div class="col-lg-9">
                    <section class="content-body p-xl-4">
                        <form method="POST" action="{{ route('settings.store') }}">
                            @csrf
                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Google Analytics</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        Your Google Analytics Measurement ID.
                                    </p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <div class="mb-3">
                                        <label class="form-label">Measurement ID</label>
                                        <input class="form-control" type="text" name="google-measurement-id"
                                            value="{{ Setting::get('google-measurement-id') }}">
                                    </div>

                                </div> <!-- col  -->
                            </div> <!-- row  -->

                            <button class="btn btn-primary" type="submit">Save all changes</button> &nbsp;
                            <button class="btn btn-outline-danger" type="reset">Reset</button>

                        </form>

                    </section> <!-- content-body   -->
                </div> <!-- col  -->
            </div> <!-- row  -->

        </div> <!-- card-body  end -->
    </div> <!-- card  end -->


</section> <!-- content-main end -->
@endsection