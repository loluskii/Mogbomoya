@guest
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="/">
    <img src="{{asset('images/logo.png')}}" height="58" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form class="form-inline my-2 my-lg-0 ml-3 mr-5">
      <input class="form-control mr-sm-2 bg-light" type="search" placeholder="Search Events" aria-label="Search" style="width: 500px; height: 60px; border: none">
    </form>
    <ul class="navbar-nav mr-0">
      <li class="nav-item mr-4">
        <a class="nav-link" href="/help-center">Help Center </a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link" href="/login">Sign In</a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link " href="/event/create" style="color: #008A69;"> <img src="{{asset('images/icons/plus.svg')}}" alt="" srcset=""> Create Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" style="color: #D60B7B; font-weight: bold"> <img src="{{asset('images/icons/location.svg')}}" alt="" srcset=""> Find events near me</a>
      </li>
    </ul>
  </div>
</nav>
@endguest

@auth
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="/">
    <img src="{{asset('images/logo.png')}}" height="58" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form class="form-inline my-2 my-lg-0 ml-3 mr-5">
      <input class="form-control mr-sm-2 bg-light" type="search" placeholder="Search Events" aria-label="Search" style="width: 500px; height: 60px; border: none">
    </form>
    <ul class="navbar-nav mr-0">
      <li class="nav-item mr-4">
        <div class="text-center">
          <a href="/event/create" class="nav-link">
            <p class="mb-0"><img src="{{asset('images/icons/plus.svg')}}" srcset=""></p>
            <p style="color: #008A69;">Create Event</p>
          </a>
        </div>
    </li>
      <li class="nav-item mr-4">
        <div class="text-center">
          <a href="/my-events" class="nav-link">
            <p class="mb-0"><img src="{{asset('images/icons/ticket-black.svg')}}" alt="" srcset=""></p>
            <p>My Events</p>
          </a>
        </div>
      </li>
      <li class="nav-item mr-4">
        <div class="text-center">
          <a href="/collections" class="nav-link">
            <p class="mb-0"><img src="{{asset('images/icons/bookmarks.svg')}}" alt="" srcset=""></p>
            <p>Bookmarks</p>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown pt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{asset('images/icons/user-image.svg')}}" alt="" srcset=""> {{auth()->user()->name}} 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item py-3" href="#">Interests</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item py-3" href="/account"><img src="{{asset('images/icons/account.svg')}}" class="px-2" alt="" srcset=""> Account Settings</a>
          <a class="dropdown-item py-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <img src="{{asset('images/icons/logout.svg')}}" class="pr-2" alt="" srcset=""> Logout
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


