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
                        <form>
                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Sitemap XML</h5>
                                    <p class="text-muted" style="max-width:90%">
                                        Generate your sitemap.xml file. <br />This may take some time.
                                    </p>
                                </div> <!-- col  -->
                                <div class="col-md-7">

                                    <div class="mb-3">
                                        <a class="btn btn-primary" href="{{ route('sitemap.generate') }}">Generate
                                            sitemap.xml</a>
                                    </div>

                                </div> <!-- col  -->
                            </div> <!-- row  -->

                        </form>

                    </section> <!-- content-body   -->
                </div> <!-- col  -->
            </div> <!-- row  -->

        </div> <!-- card-body  end -->
    </div> <!-- card  end -->


</section> <!-- content-main end -->
@endsection