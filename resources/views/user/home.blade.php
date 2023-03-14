@extends('layouts.app')

@section('content')
<!--  SECTION CONTENT -->
<section class="padding-y bg-light">
    <div class="container">

        <div class="row">
            <aside class="col-lg-3 col-xl-3">
                <!--  COMPONENT MENU LIST  -->
                <nav class="nav flex-lg-column nav-pills mb-4">
                    <a class="nav-link active" href="#">Account Settings</a>
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-person-minus-fill"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>
                <!--   COMPONENT MENU LIST END    -->
            </aside>
            <main class="col-lg-9  col-xl-9">
                <article class="card">
                    <div class="content-body">

                        <figure class="itemside align-items-center">
                            <div class="aside">
                                <span class="bg-gray icon-md rounded-circle">
                                    <img src="storage/images/avatars/avatar.jpg" class="icon-md rounded-circle">
                                </span>
                            </div>
                            <figcaption class="info">
                                <h6 class="title">{{ Auth::user()->name }}</h6>
                                <p>
                                    Email: {{ Auth::user()->email }}
                                    <a href="#" class="px-2"><i class="bi bi-pen-fill"></i></a>
                                </p>
                            </figcaption>
                        </figure>

                        <hr class="my-4">

                    </div> <!-- card-body  -->
                </article> <!-- card  -->
            </main>
        </div> <!-- row -->
        <br><br>
    </div> <!-- container   -->
</section>
<!-- SECTION CONTENT END -->

@endsection