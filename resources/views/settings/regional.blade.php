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
                        <form>

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Timezone</h5>
                                    <p class="text-muted" style="max-width:90%"> Move this and the next to a regional
                                        settings page, consectetur
                                        adipisicing something about this</p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <div class="mb-3" style="max-width: 200px">
                                        <label class="form-label">Timezone </label>
                                        <select class="form-select">
                                            <option>Pacific/Auckland</option>
                                        </select>
                                    </div>

                                    <div class="mb-3" style="max-width: 200px">
                                        <label class="form-label">Date format </label>
                                        <select class="form-select">
                                            <option>mm/dd/yyyy</option>
                                            <option>dd/mm/yyyy</option>
                                        </select>
                                    </div>

                                    <div class="mb-3" style="max-width: 200px">
                                        <input class="form-check-input" type="checkbox" value="" id="mycheck_notify"
                                            checked>
                                        <label class="form-check-label" for="mycheck_notify">
                                            Use AM:PM time format
                                        </label>
                                    </div>

                                </div> <!-- col  -->
                            </div> <!-- row  -->

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Currency</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipisicing something about this
                                    </p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <div class="mb-3" style="max-width: 200px">
                                        <label class="form-label">Main currency </label>
                                        <select class="form-select">
                                            <option>NZ Dollar</option>
                                        </select>
                                    </div>

                                    <div class="mb-3" style="max-width: 200px">
                                        <label class="form-label">Supported curencies</label>
                                        <select class="form-select">
                                            <option>NZ Dollar</option>
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