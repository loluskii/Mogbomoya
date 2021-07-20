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
            background-color: #008A69;
        }

    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 d-none d-md-block d-sm-none sidebar">
            {{-- <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div> --}}
            {{-- <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Shortcuts</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
            </div> --}}
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
                                <img src="{{asset('images/icons/user-image.svg')}}" alt="" srcset=""> {{auth()->user()->name}} 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-3" href="#">Interests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-3" href="#"><img src="{{ asset('images/icons/account.svg') }}"
                                        class="px-2" alt="" srcset=""> Account Settings</a>
                                
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
                    <div class="col-md-5 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">EMAIL ADDRESS</label>
                            <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="col-md-5 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">PASSWORD</label>
                            <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">FIRST NAME</label>
                                <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">LAST NAME</label>
                                <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                              </div>
                        </div>
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">USERNAME</label>
                                <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">DISPLAY NAME</label>
                                <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                              </div>
                        </div>
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">PHONE NUMBER</label>
                                <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">COUNTRY</label>
                                <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                              </div>
                        </div>
                    </div>
                    <div class=" px-sm-5 px-0">
                        <p class="text-center text-sm-left">Or continue with:</p>
                        <p class="text-sm-left text-center">
                            <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/apple.svg')}}" alt="" srcset=""></a>
                            <a href="{{ route('social.oauth', 'google') }}" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/google.svg')}}" alt="" srcset=""></a>
                            <a href="{{ route('social.oauth', 'facebook') }}" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/facebook.svg')}}" alt="" srcset=""></a>
                            <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/twitter.svg')}}" alt="" srcset=""></a>
                        </p>
                    </div>
                    <div class="py-4 px-sm-5 px-0">
                        <button class="btn register d-sm-none d-none d-md-block">Save Changes</button>
                        <button class="btn btn-block register d-sm-block  d-md-none">Save Changes</button>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
</div>
@endsection