{{--<header class="section-header border-bottom">
    <section class="header-main">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-4">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img class="logo" height="40" src="{{ asset('images/logo-dark.png') }}">
                    </a> <!-- brand end -->
                </div>
                @guest
                <div class="order-lg-last col-8">
                    <div class="float-end">
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-dark">
                            <i class="bi bi-person-fill"></i>
                            <span class="ms-1 d-none d-sm-inline-block">Sign in</span>
                        </a>
                        @endif
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-dark">
                            <i class="bi bi-person-plus-fill"></i>
                            <span class="ms-1 d-none d-sm-inline-block">Sign up</span>
                        </a>
                        @endif
                    </div>
                </div> <!-- col end -->
                @endguest
                @auth
                <div class="order-lg-last col-8">
                    <div class="float-end">
                        <a href="{{ route('home.index') }}" class="btn btn-outline">
                            <i class="bi bi-person-fill"></i>
                            <span class="ms-1 d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-light"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-person-minus-fill"></i>
                            <span class="ms-1 d-none d-sm-inline-block">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div> <!-- col end -->
                @endauth
            </div> <!-- container end -->
    </section>
</header> <!-- section-header end -->
--}}
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a href="{{ route('app.index') }}">
            <img src="{{ asset('storage/images/ti-black-trans.png') }}" height="40" alt="trlpht industries logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{--<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                @foreach ($categories as $category)
                <li class="nav-item"><a class="nav-link" href="#!">{{ $category->name }}</a></li>
                @endforeach--}}
                {{--<li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>--}}
                @guest
                @if (Route::has('register') && Setting::get('self-register') == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @if(Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                </li>
                @endif
                @endguest
                @auth
                <li class="nav-item">
                    @if(Auth::user()->is_admin)
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin Panel</a>
                    @else
                    <a class="nav-link" href="{{ route('home.index') }}">My Profile</a>
                    @endif
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>