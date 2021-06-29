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

        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
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
                <p><small>We sent a special 6 digit code to the email address associated with your account jo**ap****@youremail.com. Enter the code below to set your new password.</small></p>
                <form action="" class="pt-4">
                    <div class="col-sm-12 col-md-9 px-0">
                        <div class="form-group pb-2">
                            <label for="">password</label>
                            <input class="form-control form-control-lg" placeholder="**********" type="text" name="email" id="">
                        </div> 
                        <div class="form-group pb-2">
                            <label for="">password</label>
                            <input class="form-control form-control-lg" placeholder="**********" type="text" name="email" id="">
                        </div>  

                        <div class="py-4">
                            <button class="btn register d-sm-none d-none d-md-block">Done</button>
                            <button class="btn btn-block register d-sm-block  d-md-none">Done</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
