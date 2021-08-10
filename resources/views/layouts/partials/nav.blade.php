<style>
  @media (min-width: 1023px) {
    form input[type=search].form-control {
      min-width: 28vw;
      margin-left: calc(3 * .5rem);
    }
  }

  @media (max-width: 768px) {
    form input[type=search].form-control {
      min-width: 20vw;
    }

  }


  @media (max-width: 478px) {
    form input[type=search].form-control {
      min-width: 30vw;


    }
  }
</style>
@guest
<nav class="navbar navbar-expand-lg navbar-light bg-white px-sm-5 px-2">
  <a class="navbar-brand d-none d-md-block" href="/">
    <img src="{{ asset('images/logo.png') }}" height="58" alt="">
  </a>
  <a class="navbar-brand d-sm-block d-md-none mr-0" href="/">
    <img src="{{ asset('images/logo-colored.png') }}" height="58" alt="">
  </a>
  <form action="{{ route('search') }}" method="GET" class="form-inline my-2">
    <input name="search" class="form-control bg-light" type="search" placeholder="Search Events" aria-label="Search"
      style=" height: 60px; border: none">
  </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    {{-- <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0 ml-3 mr-5">
      <input name="search" class="form-control mr-sm-2 bg-light" type="search" placeholder="Search Events"
        aria-label="Search" style="width: 500px; height: 60px; border: none">
    </form> --}}
    <ul class="navbar-nav ml-auto">
      <li class="nav-item mr-4">
        <a class="nav-link" href="{{ route('signup.view') }}">Help Center </a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link" href="{{ route('login.view') }}">Sign In</a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link " href="{{ route('event.create') }}" style="color: #008A69;"> <img
            src="{{ asset('images/icons/plus.svg') }}" alt="" srcset=""> Create Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('events.near') }}" style="color: #D60B7B; font-weight: bold"> <img
            src="{{ asset('images/icons/location.svg') }}" alt="" srcset=""> Find events near me</a>
      </li>
    </ul>
  </div>
</nav>
@endguest

@auth
<nav class="navbar navbar-expand-lg navbar-light bg-white px-sm-5 px-2">
  <a class="navbar-brand d-none d-md-block" href="/">
    <img src="{{ asset('images/logo.png') }}" height="58" alt="">
  </a>
  <a class="navbar-brand d-sm-block d-md-none mr-0" href="/">
    <img src="{{ asset('images/logo-colored.png') }}" height="58" alt="">
  </a>
  <form action="{{ route('search') }}" method="GET" class="form-inline my-2">
    <input name="search" class="form-control mr-sm-2 bg-light" type="search" placeholder="Search Events"
      aria-label="Search" style=" height: 60px; border: none">
  </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    {{-- <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0 ml-3 mr-5">
      <input name="search" class="form-control mr-sm-2 bg-light" type="search" placeholder="Search Events"
        aria-label="Search" style="width: 500px; height: 60px; border: none">
    </form> --}}
    <ul class="navbar-nav ml-auto">
      <li class="nav-item mr-4">
        <div class="text-center">
          <a href="{{ route('event.create') }}" class="nav-link">
            <p class="mb-0"><img src="{{ asset('images/icons/plus.svg') }}" srcset=""></p>
            <p style="color: #008A69;">Create Event</p>
          </a>
        </div>
      </li>
      <li class="nav-item mr-4">
        <div class="text-center">
          <a href="{{ route('user.events') }}" class="nav-link">
            <p class="mb-0"><img src="{{ asset('images/icons/ticket-black.svg') }}" alt="" srcset="">
            </p>
            <p>My Events</p>
          </a>
        </div>
      </li>
      <li class="nav-item mr-4">
        <div class="text-center">
          <a href="{{ route('user.collections') }}" class="nav-link">
            <p class="mb-0"><img src="{{ asset('images/icons/bookmarks.svg') }}" alt="" srcset="">
            </p>
            <p>Bookmarks</p>
          </a>
        </div>
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
          <a class="dropdown-item py-3" href="{{ route('user.edit') }}"><img
              src="{{ asset('images/icons/account.svg') }}" class="px-2" alt="" srcset=""> Account
            Settings</a>
          <a class="dropdown-item py-3" href="#"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{ asset('images/icons/logout.svg') }}" class="pr-2" alt="" srcset=""> Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
@endauth