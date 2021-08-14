<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="col-md-3 col-lg-2 mr-0 px-3" style="padding-top: .75rem; padding-bottom: .75rem; " href="#">
        <img src="{{ asset('images/full-logo-white.svg') }}" alt="" srcset="">
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @auth
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    @endauth
</nav>
