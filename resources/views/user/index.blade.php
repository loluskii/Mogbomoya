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
            @include('user.side-nav')
            
            <div class="container px-sm-5 px-2 mt-5 pt-3">
                <h3 class=" px-sm-5">My Account</h3>
                <p class=" px-sm-5">Manage your account details and public profile</p>
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
                    <form action="{{ route('user.update')}}" method="POST">
                    @csrf
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">FULL NAME</label>
                                <input type="text" name="name" id="" class="form-control form-control-lg" value="{{auth()->user()->name}} " placeholder="John Appleased" aria-describedby="helpId">
                                @error('name')
                                    <b class="text-danger">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">USERNAME</label>
                                <input type="text" name="username" id="" value="{{auth()->user()->username}}" class="form-control form-control-lg" placeholder="appleased" aria-describedby="helpId">
                                @error('username')
                                    <b class="text-danger">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col">
                            <div class="form-group">
                                <label for="">DISPLAY NAME</label>
                                <input type="text" name="display_name" id="" class="form-control form-control-lg" placeholder="John Appleseed" aria-describedby="helpId">
                              </div>
                        </div> --}}
                    </div>
                    <div class="form-row py-2 px-sm-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="">PHONE NUMBER</label>
                                <input type="text" name="phone_number" id="" class="form-control form-control-lg" value="{{auth()->user()->phone_number}}" placeholder="+234 123 4567 890" aria-describedby="helpId">
                                @error('phone_number')
                                    <b class="text-danger">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">COUNTRY</label>
                                <select class="form-control form-control-lg" name="country" id="">
                                    <option value=" ">--Select Country--</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country}}" {{$country == auth()->user()->country ? 'selected' : ''}}>{{$country}}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <b class="text-danger">{{ $message }} </b>
                                @enderror
                              </div>
                        </div>
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
  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Verify Your Password </h5>
            <p class="mb-0"> Re-enter your Mogbomoya password to continue.</p>
            <form action="{{ route('user.update.password') }}" method="POST" class="py-4">
                @csrf
                <div class="form-group">
                    @if (auth()->user()->password != '')
                        <label for="">CURRENT PASSWORD</label>
                        <input type="text" name="current_password" id="oldPassword" class="form-control form-control-lg" placeholder="Old Password" aria-describedby="helpId">
                        @error('current_password')
                            <b class="text-danger">{{ $message }} </b>
                        @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label for="">NEW PASSWORD</label>
                    <input type="text" name="new_password" id="newPassword" class="form-control form-control-lg" placeholder="New Password" aria-describedby="helpId">
                    @error('new_password')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">CONFIRM PASSWORD</label>
                    <input type="text" name="new_confirm_password" id="cPassword" class="form-control form-control-lg" placeholder="Confirm Password" aria-describedby="helpId">
                    @error('new_confirm_password')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
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
        $('#changePasswordModal').modal('show');
    })
})




</script>

@endsection