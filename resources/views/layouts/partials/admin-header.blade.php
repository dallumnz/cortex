<header class="main-header navbar">
    <div class="col-search">
        <form class="searchform">
            <div class="input-group">
                <input list="search_terms" type="text" class="form-control" placeholder="Search term">
                <button class="btn btn-light bg" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside">
            <i class="bi bi-menu-button-wide"></i>
        </button>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link btn-icon" href="{{ route('app.index') }}" target="_blank">
                    <i class="bi bi-window-plus"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-icon" href="#"> <i class="bi bi-bell-fill"></i> </a>
            </li>
            <li class="nav-item px-3">
                <span>{{ Auth::user()->name }}</span>
            </li>
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#"> <img class="img-xs rounded-circle"
                        src="{{ $user->gravatar }}" alt="{{ Auth::user()->name . ' menu' }}"></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="ms-1 d-none d-sm-inline-block">Sign out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>