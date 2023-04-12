@extends('layouts.admin')

@section('content')
<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">System Settings </h2>
    </div>
    @include('system.notification')
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
                                    <h5>Basic information</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        Your website name and description. Changes to your website name must be made
                                        manually by your system administrator.
                                    </p>
                                </div> <!-- col  -->
                                <?php //dd($settings);?>
                                <div class="col-md-7">

                                    <div class="mb-3">
                                        <label class="form-label">Website name</label>
                                        <input class="form-control" type="text" name="site-name" disabled
                                            value="{{ Setting::get('site-name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Website Description</label>
                                        <textarea type="text" class="form-control"
                                            name="site-desc">{{ Setting::get('site-desc') }}</textarea>
                                    </div>

                                </div> <!-- col  -->
                            </div> <!-- row  -->

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Registration</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        User registration options
                                    </p>
                                </div> <!-- col  -->

                                <div class="col-md-7">

                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" type="radio" value="0" name="self-register"
                                            @if(Setting::get('self-register')==0) checked @endif>
                                        <span class="form-check-label">
                                            Administrator registration only
                                        </span>
                                    </label>

                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" type="radio" value="1" name="self-register"
                                            @if(Setting::get('self-register')==1) checked @endif>
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
                                        <input class="form-check-input" type="checkbox" name="admin-notify"
                                            @if(Setting::get('admin-notify')=='on' ) checked @endif>
                                        <label class="form-check-label">
                                            Send notification on new user registration
                                        </label>
                                        <p class="small text-muted">Only valid if self-registration is enabled.</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email subject line</label>
                                        <input class="form-control" value="{{ Setting::get('admin-notify-text') }}"
                                            name="admin-notify-text">
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