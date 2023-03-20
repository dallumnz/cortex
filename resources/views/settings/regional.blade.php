@extends('layouts.admin')

@section('content')
<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">System Settings </h2>
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
                                    <h5>Timezone</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        This should be the time zone that you operate in.
                                        Currently only NZ is supported.
                                    </p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <div class="mb-3">
                                        <label class="form-label">Timezone </label>
                                        <select class="form-select" name="timezone">
                                            <option value="+12:00">Pacific/Auckland</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Short date format </label>
                                        <p class="small text-muted">Using 01 February 2023 as an example</p>
                                        <select class="form-select" name="short-date-format">
                                            <option value="m/d/Y">12/01/2023</option>
                                            <option value="d/m/Y">01/12/2023</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Long date format </label>
                                        <p class="small text-muted">Using 01 February 2023 as an example</p>
                                        <select class="form-select" name="long-date-format">
                                            <option value="F d Y">February 01 2023</option>
                                            <option value="l, F d Y">Wednesday, February 01 2023</option>
                                            <option value="d F Y">01 February 2023</option>
                                            <option value="l, F d Y">Wednesday, 01 February 2023</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <input class="form-check-input" type="checkbox" name="12-hour-time" checked>
                                        <label class="form-check-label">Use 12 hour time format</label>
                                    </div>

                                </div> <!-- col  -->
                            </div> <!-- row  -->

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Currency</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        Currency support
                                    </p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <div class="mb-3">
                                        <label class="form-label">Main currency </label>
                                        <select class="form-select" name="main-currency">
                                            <option value="NZD">NZ Dollar</option>
                                        </select>
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