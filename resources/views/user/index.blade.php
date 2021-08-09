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
            
            <div class="container px-4 mt-4 mt-sm-2 pt-3">
                <h3 class=" px-sm-5">My Account</h3>
                <p class=" px-sm-5">Manage your account details and public profile</p>
                    <div class="col-md-4 col-sm-10 px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">EMAIL ADDRESS</label>
                            <button type="button" style="padding: 8px 16px" name="changeEmail" id="changeEmail" class="w-100 rounded form-contro-lg text-center bg-white border text-muted">Change Email</button>
                          </div>
                    </div>
                    <div class="col-md-4 col-sm-10  px-sm-5 px-0">
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
                                <input type="text" name="phone_number" id="" class="form-control form-control-lg" value="{{auth()->user()->phone_number ?? ''}}" placeholder="+234 123 4567 890" aria-describedby="helpId">
                                @error('phone_number')
                                    <b class="text-danger">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">COUNTRY</label>
                                <select class="form-control form-control-lg" name="country" id="">
                                    <option value="">--Select Country--</option>
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
                    <div class="form-row py-2 px-sm-5">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">CUSTOMIZE YOUR INTERESTS</label>
                                <select class="form-control form-control-lg interests" name="interests[]" id="" multiple>
                                    <option value="">---</option>
                                    @foreach($interests as $interest)
                                        <option value="{{$interest->id}}" {{in_array($interest->id, $myInterests) ? 'selected' : ''}}> <img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""> {{$interest->name}} </option>
                                    @endforeach
                                </select>                               
                                 @error('interests')
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

@include('user.change-password-modal')

@include('user.change-email-modal')

@endsection

@section('script')

<script>

$(document).ready(function(){
    $('#changeEmail').click(function(){
        $('#changeEmailModal').modal('show');
    });
    $('#changePassword').click(function(){
        $('#changePasswordModal').modal('show');
    });
    $('.interests').select2();


    var body = $('#myModal');

    function goToNextInput(e) {
        var key = e.which,
        t = $(e.target),
        sib = t.next('input');

        if (key != 9 && (key < 48 || key > 57)) {
            e.preventDefault();
            return false;
        }

        if (key === 9) {
            return true;
        }

        if (!sib || !sib.length) {
            sib = body.find('input').eq(0);
        }
        sib.select().focus();
    }

    function onKeyDown(e) {
        var key = e.which;

        if (key === 9 || (key >= 48 && key <= 57)) {
            return true;    
        }

        e.preventDefault();
        return false;
    }

    function onFocus(e) {
        $(e.target).select();
    }

    body.on('keyup', 'input', goToNextInput);
    body.on('keydown', 'input', onKeyDown);
    body.on('click', 'input', onFocus);

   
})




</script>

@endsection