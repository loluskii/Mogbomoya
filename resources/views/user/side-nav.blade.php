<style>
    @media (max-width:478px ){
        .navbar{
        background: white;
    }
    }

    @media (max-width:768px ){
        .navbar{
            background: white;
        }
        .container{
            padding: 0px;
        }
    }
</style>
<div class="col-md-3 d-none d-md-block d-sm-none sidebar" style="height: 120vh">
    <div class="list-group list-group-flush mt-5 pt-2">
        <a href="/" class="mb-5 pb-5"><img src="{{asset('images/logo-white.svg')}}" class="img-fluid" style="height: 50px" srcset=""></a>
        <a class="list-group-item list-group-item-action" href="{{ route('user.edit') }}">My account</a>
        <a class="list-group-item list-group-item-action p-3" href="{{route('bank.details')}}">Bank account details</a>
        {{-- <a class="list-group-item list-group-item-action p-3" href="#!">Customize your interests</a> --}}
        <a class="list-group-item list-group-item-action p-3" href="#!">Talk to us</a>
        @if(auth()->user()->password != '')
        {{-- request password modal --}}
            <a class="list-group-item list-group-item-action p-3"  id="inputPassword" href="#">Deactivate account</a> 
        @else
            <a class="list-group-item list-group-item-action p-3" onclick="return confirm('Are you sure you want to deactivate this account?') ? initRoute() : '' "  href="#">Deactivate account</a> 
        @endif

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</div>
<div class="col-md-9 px-0">
    <nav class="navbar navbar-expand-lg navbar-light px-2">
        <a class="navbar-brand d-md-none d-sm-block" href="/">
            <img src="{{asset('images/logo.png')}}" height="58" alt="">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="circle">
                            <span class="initials">{{ Auth::user()->initials() }}</span>
                          </div>
                           <span class="ml-1">{{auth()->user()->name}}</span> 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item py-3" href="#">Interests</a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item py-3" href="{{ route('user.edit')}}"><img src="{{ asset('images/icons/account.svg') }}"class="px-2" alt="" srcset="">
                            Account Settings
                        </a>
                        <a class="dropdown-item py-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img src="{{asset('images/icons/logout.svg')}}" class="pr-2" alt="" srcset=""> Logout
                        </a>
                
                        <form id="status-form" action="{{ route('user.deactivate') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @include('user.deactivate-modal')
<script>
$(document).ready(function(){
    $('#inputPassword').click(function(){
        $('#passwordModal').modal('show');
    })
})

function initRoute(){
    event.preventDefault(); 
    document.getElementById('status-form').submit();
}


</script>