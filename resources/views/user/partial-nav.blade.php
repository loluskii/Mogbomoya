<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand d-md-none d-sm-block" href="/">
        <img src="{{ secure_asset('images/logo.png') }}" height="58" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-4" style="padding-top: 15px">
                <a class="nav-link" href="/">Home </a>
            </li>
            <li class="nav-item dropdown pt-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="circle">
                        <span class="initials">{{ Auth::user()->initials() }}</span>
                    </div>
                    <span class="ml-1">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    {{-- <a class="dropdown-item py-3" href="#">Interests</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item py-3" href="{{ route('user.edit') }}"><img
                            src="{{ secure_asset('images/icons/account.svg') }}" class="px-2" alt="" srcset="">
                        Account Settings
                    </a>

                    <a class="dropdown-item py-3" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{ secure_asset('images/icons/logout.svg') }}" class="pr-2" alt="" srcset=""> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>