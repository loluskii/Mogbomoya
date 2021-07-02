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

        .form-control{
            margin-right: 12px;
            background-color: transparent;
            border-top: transparent;
            border-left: transparent;
            border-right: transparent;
            border-bottom: 2px solid grey;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-control:focus {
            color: #495057;
            background-color: transparent;
            border-bottom: 2px solid #008A69;
            outline: 0;
            box-shadow: none;
            text-align: center;
        }
        .resend{
            color: #008A69;
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
                        <div class="d-flex justify-content-center align-items-center container">
                            <div class="py-5">
                                <div class="d-flex flex-row mt-5">
                                    <input type="text" class="form-control text-center" autofocus="">
                                    <input type="text" class="form-control  text-center">
                                    <input type="text" class="form-control  text-center">
                                    <input type="text" class="form-control  text-center">
                                    <input type="text" class="form-control  text-center">
                                    <input type="text" class="form-control  text-center">
                                </div>
                                <div class="py-4">
                                    <button class="btn register d-sm-none d-none d-md-block">Verify</button>
                                    <button class="btn btn-block register d-sm-block  d-md-none">Verify</button>
                                    {{-- <a href="" class="font-weight-bold">Cancel</a> --}}
                                </div>
                                <div class="text-center mt-5">
                                    <span class="d-block mobile-text">Don't receive the code? <a href="" class="font-weight-bold resend">Resend</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<div class="d-flex justify-content-center align-items-center container">
    <div class="card py-5 px-3">
        <h5 class="m-0">Mobile phone verification</h5><span class="mobile-text">Enter the code we just send on your mobile phone <b class="text-danger">+91 86684833</b></span>
        <div class="d-flex flex-row mt-5"><input type="text" class="form-control" autofocus=""><input type="text" class="form-control"><input type="text" class="form-control"><input type="text" class="form-control"></div>
        <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span class="font-weight-bold text-danger cursor">Resend</span></div>
    </div>
</div>