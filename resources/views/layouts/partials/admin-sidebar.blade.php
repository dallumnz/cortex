<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="page-index-1.html" class="brand-wrap">
            <img src="{{ asset('storage/images/dalbro-admin.png') }}" height="46" class="logo" alt="dalbro Admin Panel">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize">
                <i class="bi bi-chevron-bar-left"></i>
            </button>
        </div>
    </div> <!-- aside-top.// -->

    <nav>
        <ul class="menu-aside">
            <li class="menu-item active">
                <a class="menu-link" href="{{ route('admin.index') }}">
                    <i class="bi bi-house-fill"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{ route('posts.index') }}">
                    <i class="bi bi-file-earmark-richtext-fill"></i>
                    <span class="text">Posts</span>
                </a>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="bi bi-cart-x-fill"></i>
                    <span class="text">Menu item</span>
                </a>
                <div class="submenu">
                    <a href="#">List view</a>
                    <a href="#">Table view</a>
                    <a href="#">Grid view</a>
                </div>
            </li>
            <hr>
            <small class="text-muted">MANAGE</small>
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <i class="bi bi-people-fill"></i>
                    <span class="text">User Accounts</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{ route('newsletters.index') }}">
                    <i class="bi bi-chat-text-fill"></i>
                    <span class="text">Newsletters</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{ route('categories.index') }}">
                    <i class="bi bi-clipboard-fill"></i>
                    <span class="text">Categories</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{ route('settings.index') }}">
                    <i class="bi bi-gear-fill"></i>
                    <span class="text">System Settings</span>
                </a>
            </li>
            <hr>
            <small class="text-muted sb-head">STATIC CONTENT</small>
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <i class="bi bi-person-vcard"></i>
                    <span class="text">Social Media Links</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{ route('pages.index') }}">
                    <i class="bi bi-file-earmark-richtext-fill"></i>
                    <span class="text">Site Pages</span>
                </a>
            </li>
            <hr>
            <small class="text-muted">FEEDBACK</small>
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <i class="bi bi-envelope-fill"></i>
                    <span class="text">Mail</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="#">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <hr>
            <small class="text-muted">MISC</small>
            <li class="menu-item">
                <a class="menu-link" href="{{ route('admin.blank') }}">
                    <i class="bi bi-file-text-fill"></i>
                    <span class="text">Blank page</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>