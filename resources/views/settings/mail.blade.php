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
                                    <h5>Basic information</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        Your website name and site description.
                                    </p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <div class="mb-3">
                                        <label class="form-label">Home page title</label>
                                        <input class="form-control" type="text" name="" placeholder="Type here">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea type="text" class="form-control"></textarea>
                                    </div>

                                </div> <!-- col  -->
                            </div> <!-- row  -->

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Registration</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        User registration options.
                                    </p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" name="mycheck_a1" type="radio">
                                        <span class="form-check-label">
                                            Administrator registration only
                                        </span>
                                    </label>

                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" checked="" name="mycheck_a1" type="radio">
                                        <span class="form-check-label">
                                            Self-registration is enabled
                                        </span>
                                    </label>

                                </div> <!-- col  -->
                            </div> <!-- row  -->

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Email Notification</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        Configure admin email notifications
                                    </p>
                                </div>
                                <div class="col-md-7">

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="mycheck_notify"
                                            checked>
                                        <label class="form-check-label" for="mycheck_notify">
                                            Send notification on new user registration
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <input class="form-control" placeholder="Text">
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