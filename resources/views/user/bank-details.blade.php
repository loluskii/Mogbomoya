@extends('layouts.account-nav') 
@section('css')
    <style>
        label{
            font-size: 12px;
        }
        .btn {
            background-color: #008A69;
            color: #fff;
            padding: 12px 32px;
        }
        .sidebar{
            background-color: #006554;
            height: 100vh;
        }
        .list-group-item {
            background-color: transparent;
            color: white;
            font-weight: bold;
        }


    </style>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 d-none d-md-block d-sm-none sidebar">
            <div class="list-group list-group-flush mt-5 pt-2">
                <a href="/" class="mb-5 pb-5"><img src="{{asset('images/logo-white.svg')}}" class="img-fluid" style="height: 50px" srcset=""></a>
                <a class="list-group-item list-group-item-action" href="account">My account</a>
                <a class="list-group-item list-group-item-action p-3" href="/user/bank-details">Bank account details</a>
                <a class="list-group-item list-group-item-action p-3" href="#!">Customize your interests</a>
                <a class="list-group-item list-group-item-action p-3" href="#!">Talk to us</a>
                <a class="list-group-item list-group-item-action p-3" href="#!">Deactivate account</a>
            </div>

        </div>
        <div class="col-md-9 px-sm-0 px-2">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-4" style="padding-top: 15px">
                            <a class="nav-link" href="#">Help Center </a>
                        </li>
                        <li class="nav-item dropdown pt-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <img src="{{asset('images/icons/user-image.svg')}}" alt="" srcset=""> {{auth()->user()->name}}  --}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-3" href="#">Interests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-3" href="#"><img src="{{ asset('images/icons/account.svg') }}"class="px-2" alt="" srcset="">
                                    Account Settings
                                </a>
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
        

            <div class="container px-sm-5 px-2 mt-5 pt-3">
                <h3 class=" px-sm-5">My Account</h3>
                <p class=" px-sm-5">Manage your account details and public profile</p>
                <form action="">
                    <div class="col-md-10 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">SELECT BANK</label>
                            <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="col-md-10 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">ACCOUNT NUMBER</label>
                            <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="py-4 px-sm-5 px-0">
                        <button class="btn register d-sm-none d-none d-md-block">Validate Account</button>
                        <button class="btn btn-block register d-sm-block  d-md-none">Validate Account</button>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
</div>
@endsection