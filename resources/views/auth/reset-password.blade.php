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

    .form-control {
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

    .resend {
        color: #008A69;
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
            <img src="{{ secure_asset('images/side.svg') }}" alt="" srcset="">
        </div>
        <div class="col-md-6">
            <div class="container p-5 mt-5">
                <h3 style="font-weight: bold">Create a new Password</h3>
                {{-- <p><small>We sent a special 6 digit code to the email address associated with your account
                        jo**ap****@youremail.com. Enter the code below to set your new password.</small></p> --}}
                <form action="{{route('user.reset.password')}}" method="POST" class="pt-4" autocomplete="off">
                    @csrf
                    <div class="col-sm-12 col-md-9 px-0">
                        <div class="container">
                            <div class="py-5">
                                {{-- <div class="d-flex flex-row mt-5">
                                    <input type="text" name="digit1" class="form-control text-center" autofocus="">
                                    <input type="text" name="digit2" class="form-control  text-center">
                                    <input type="text" name="digit3" class="form-control  text-center">
                                    <input type="text" name="digit4" class="form-control  text-center">
                                    <input type="text" name="digit5" class="form-control  text-center">
                                    <input type="text" name="digit6" class="form-control  text-center">
                                </div> --}}
                                {{-- <div class="text-center mt-4">
                                    <span class="d-block mobile-text">Didn't receive the code? <a href=""
                                            class="font-weight-bold resend">Resend</a></span>
                                </div> --}}
                                <label for="">Email Address</label>
                                <input type="email" name="email" class="form-control" id="">
                                @error('email')
                                <b class="text-danger">{{ $message }} </b>
                                @enderror
                                <div class="pt-5 pb-2">
                                    <button class="btn btnPrimary d-sm-none d-none d-md-block">Submit</button>
                                    <button
                                        class="btn btnPrimary btn-block register d-sm-block  d-md-none">Submit</button>
                                </div>
                                <a href="{{route('login.view')}}" class="mt-3 resend font-weight-bold"
                                    style="text-decoration: none;">Cancel</a>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>