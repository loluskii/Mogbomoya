@extends('events.main')
@section('css')
<style>
    body {
        margin: 0;
        overflow-y: hidden;
    }

    label {
        font-size: 11px;
        font-weight: 700;
        color: grey;
        text-transform: uppercase;
    }

    .register {
        background-color: #008A69;
        color: #fff;
        padding: 8px 32px;
    }


    .left {
        z-index: 1;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        text-decoration: none;
    }
</style>
@endsection

<div class="bg-light">
    <div class="row">
        <div class="col-md-5 d-sm-none d-none d-md-block">
            <img src="{{ asset('images/side.svg') }}" alt="" srcset="">
        </div>
        <div class="col-md-6">
            <div class="container p-5 mt-5">
                <h3 style="font-weight: bold">Create a new Password</h3>
                {{-- <p><small>We sent a special 6 digit code to the email address associated with your account
                        jo**ap****@youremail.com. Enter the code below to set your new password.</small></p> --}}
                <form action="{{route('user.password.update')}}" method="POST" class="pt-4" onsubmit="return validate()"
                    autocomplete="off">
                    @csrf
                    <div class="col-sm-12 col-md-9 px-0">
                        <div class="form-group pb-2">
                            <label for="">Email</label>
                            <input class="form-control form-control-lg" placeholder="**********" type="email"
                                name="email" value="{{$email}}">
                            @error('email')
                            <b class="text-danger">{{ $message }} </b>
                            @enderror
                        </div>
                        <div class="form-group pb-2">
                            <label for="">New Password</label>
                            {{-- <input class="form-control form-control-lg" placeholder="**********" type="password"
                                pattern="^[a-z]{2,4}$" name="password" id="newPassword1"> --}}
                            <input class="form-control form-control-lg" placeholder="**********" type="password"
                                name="password" id="newPassword1">
                            @error('password')
                            <b class="text-danger">{{ $message }} </b>
                            @enderror
                        </div>
                        <div class="form-group pb-2">
                            <label for="">Confirm Password</label>
                            {{-- <input class="form-control form-control-lg" placeholder="**********"
                                pattern="^[a-z]{2,4}$" type="password" name="password_confirmation" id="newPassword2">
                            --}}
                            <input class="form-control form-control-lg" placeholder="**********" type="password"
                                name="password_confirmation" id="newPassword2">
                            @error('password_confirmation')
                            <b class="text-danger">{{ $message }} </b>
                            @enderror
                            <input type="hidden" name="token" value="{{$token}}">
                        </div>
                        <div class="invalid-feedback">a to z only (2 to 4 long)</div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
                            <label class="form-check-label pt-1" for="exampleCheck1">Show Password</label>
                        </div>

                        <div class="py-4">
                            <button type="submit" class="btn register d-sm-none d-none d-md-block">Done</button>
                            <button type="submit" class="btn btn-block register d-sm-block  d-md-none">Done</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

@section('script')
<script>
    // $(document).ready(function(event){
    //     $("#newPassword1").keyup(function(e){
    //     var val = $(this).val();
    //     val = val.replace(/[^\w]+/g, "");
    //     $("#newPassword2").val(val);
    //     });

    //     $('.checkbox').click(function(){
    //         $(this).is(':checked') ? $('#newPassword1, #newPassword2 ').attr('type', 'text') : $(' #newPassword1, #newPassword2 ').attr('type', 'password');
    //     })

    //     var pass=$("#newPassword1").val();
    //     var password_regex1=/([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;
    //     var password_regex2=/([0-9])/;
    //     var password_regex3=/([!,%,&,@,#,$,^,*,?,_,~])/;
    //     var passwordTest = true;

        
        

    })
    
</script>
@endsection