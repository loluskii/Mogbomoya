@extends('layouts.account-nav') 
@section('css')
    <style>
        label{
            font-size: 12px;
        }
        .btn {
            background-color: #008A69;
            color: #fff;
            padding: 8px 32px;
        }
        .sidebar{
            background-color: #006554;
        }
        
        .digit{
            margin-right: 12px;
            background-color: transparent;
            border-top: transparent;
            border-left: transparent;
            border-right: transparent;
            border-bottom: 3px solid grey;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .digit:focus {
            color: #495057;
            background-color: transparent;
            border-bottom: 3px solid #008A69;
            outline: 0;
            box-shadow: none;
            text-align: center;
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
            {{-- <div class="sidebar-heading border-bottom bg-light">
                <a href="/" class="mt-5"><img src="{{asset('images/logo-white.svg')}}" class="img-fluid" style="height: 50px" srcset="">
                    <span style="font-size: 23px; font-weight: 700; text-decoration: none; color: white">Mogbomoya</span>
                </a>
            </div> --}}
            <div class="list-group list-group-flush mt-5 pt-2">
                <a href="/" class="mb-5 pb-5"><img src="{{asset('images/logo-white.svg')}}" class="img-fluid" style="height: 50px" srcset=""></a>
                <a class="list-group-item list-group-item-action" href="/account">My account</a>
                <a class="list-group-item list-group-item-action p-3" href="{{route('bank.details')}}">Bank account details</a>
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
                    <div class="col-md-4 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">EMAIL ADDRESS</label>
                            <button type="button" style="padding: 8px 16px" name="changeEmail" id="changeEmail" class="w-100 rounded form-contro-lg text-center bg-white border text-muted">Change Email</button>
                          </div>
                    </div>
                    <div class="col-md-4 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">PASSWORD</label>
                            <button type="button" style="padding: 8px 16px" name="changePassword" id="changePassword" class="w-100 rounded form-contro-lg text-center bg-white border text-muted">Change Password</button>
                          </div>
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">FIRST NAME</label>
                                <input type="text" name="fname" id="" class="form-control form-control-lg" placeholder="John" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">LAST NAME</label>
                                <input type="text" name="lname" id="" class="form-control form-control-lg" placeholder="Appleseed" aria-describedby="helpId">
                              </div>
                        </div>
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">USERNAME</label>
                                <input type="text" name="uname" id="" class="form-control form-control-lg" placeholder="appleseed" aria-describedby="helpId">
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">DISPLAY NAME</label>
                                <input type="text" name="display_name" id="" class="form-control form-control-lg" placeholder="John Appleseed" aria-describedby="helpId">
                              </div>
                        </div>
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">PHONE NUMBER</label>
                                <input type="text" name="phone_no" id="" class="form-control form-control-lg" placeholder="+234 123 4567 890" aria-describedby="helpId">
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">COUNTRY</label>
                                <select class="form-control form-control-lg" name="country" id="">
                                    <option value="">---</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="GH">Ghana</option>
                                    <option value="CAM">Cameroon</option>
                                  </select>
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

  
  <!-- Change email Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Change your email </h5>
                
                <form action="" class="verifyPasswordForm pt-1 pb-4"   style="display: none" >
                    <p style="font-size: 12px"> Re-enter your Mogbomoya password to continue.</p>
                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="text" name="checkPassword" id="checkPassword" class="form-control form-control-lg" placeholder="Enter Password" aria-describedby="helpId">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
                        <label class="form-check-label pt-1"  for="exampleCheck1">Show Password</label>
                    </div> 
                    <div class="py-3">
                        <button type="submit" class="btn py-2">Continue</button>
                    </div>
                </form>

                <form action="" class="updateEmailForm pt-1 pb-3"  style="display: none">
                    <p style="font-size: 12px"> Your current email is <span>daraassimi@gmail.com</span>. What would you like to update it to? Note that your email is not shouwn in your public profile </p>
                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email" name="changeEmail" id="changeEmail" class="form-control form-control-lg" placeholder="Change Password" aria-describedby="helpId">
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn py-2">Continue</button>
                    </div>    
                </form>
                <form action="" class="verifynewEmailForm pt-1 pb-3"autocomplete="off">
                    <p>We've sent you a code. Enter it to verify your new email address.</p>
                    <div class="d-flex flex-row mt-5 px-sm-5 px-0">
                        <input type="text" name="digit1" class="form-control digit mr-2 text-center" autofocus="">
                        <input type="text" name="digit2" class="form-control digit mx-2 text-center">
                        <input type="text" name="digit3" class="form-control digit mx-2 text-center">
                        <input type="text" name="digit4" class="form-control digit mx-2 text-center">
                        <input type="text" name="digit5" class="form-control digit mx-2 text-center">
                        <input type="text" name="digit6" class="form-control digit mx-2 text-center">
                    </div>
                    <div class="text-center mt-4">
                        <span class="d-block mobile-text">Don't receive the code? <a href="" class="font-weight-bold resend">Resend</a></span>
                    </div>
                    <div class="pt-3 text-center pb-2">
                        <button class="btn btnPrimary btn-block">Verify</button>
                    </div>
                </form>
            </div>
        </div>
        
        </div>
    </div>
</div>
{{-- Change email modal --}}

<!-- Change password Modal -->
  <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Verify Your Password </h5>
            <p class="mb-0"> Re-enter your Mogbomoya password to continue.</p>
            <form action="" class="py-4">
                <div class="form-group">
                    <label for="">PASSWORD</label>
                    <input type="text" name="oldPassword" id="oldPassword" class="form-control form-control-lg" placeholder="Old Password" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">NEW PASSWORD</label>
                    <input type="text" name="newPassword" id="newPassword" class="form-control form-control-lg" placeholder="New Password" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">CONFIRM PASSWORD</label>
                    <input type="text" name="cPassword" id="cPassword" class="form-control form-control-lg" placeholder="Confirm Password" aria-describedby="helpId">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
                    <label class="form-check-label pt-1"  for="exampleCheck1">Show Password</label>
                </div> 
                <div class="py-3">
                    <button type="submit" class="btn btnPrimary py-2">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        
        </div>
    </div>
</div>





@endsection

@section('script')

<script>

$(document).ready(function(){
    $('#changeEmail').click(function(){
        $('#myModal').modal('show');
    })
    $('#changePassword').click(function(){
        $('#passwordModal').modal('show');
    })
})




</script>

@endsection