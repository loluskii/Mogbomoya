<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="#">
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
        <a class="nav-link" href="#">Help Center </a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link" href="#">Sign In</a>
      </li>
      <li class="nav-item mr-4">
        <a class="nav-link " href="#" style="color: #008A69;"> <img src="{{asset('images/icons/plus.svg')}}" alt="" srcset=""> Create Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" style="color: #D60B7B; font-weight: bold"> <img src="{{asset('images/icons/location.svg')}}" alt="" srcset=""> Find events near me</a>
      </li>
    </ul>
  </div>
</nav>