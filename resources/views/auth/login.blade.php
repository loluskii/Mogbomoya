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

        p a{
            text-decoration: none;
            color:#008A69;
            font-weight: bold;
        }
        a:hover{
            text-decoration: none;
            color:#008A69;
        }
        input::placeholder{
            font-size: 14px;
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
                <h3 style="font-weight: bold">Welcome to Mogbomoya👋🏾</h3>
                <p class="text-muted">Already have an account? <a href="">Sign In</a></p>
                <form action="" class="pt-4" autocomplete="off">
                    <div class="col-sm-12 col-md-10 px-0">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group pb-2">
                                    <label for="">full name</label>
                                    <input class="form-control form-control-lg" placeholder="John Appleseed" type="text" name="email" id="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label for="">pick a username</label>
                                    <input class="form-control form-control-lg" placeholder="@appleseed" type="text" name="email" id="" >
                                </div>  
                            </div>  
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group pb-2">
                                    <label for="">email address</label>
                                    <input class="form-control form-control-lg" placeholder="youremail@address.com" type="text" name="email" id="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-2">
                                    <label for="">phone number</label>
                                    <input class="form-control form-control-lg" placeholder="2349-012-3456" type="text" name="email" id="">
                                </div>  
                            </div>  
                        </div>
                        <div class="form-group pb-2">
                            <label for="">password</label>
                            <input class="form-control form-control-lg" placeholder="**********" type="text" name="email" id="">
                        </div>  
                        <div class="form-row justify-content-between pb-4">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2 ml-1">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label pt-1" for="customControlInline">Accept terms and condition <sup>*</sup></label>
                              </div>
                            
                        </div>
                        <div class="py-4">
                            <button class="btn register d-sm-none d-none d-md-block">Continue</button>
                            <button class="btn btn-block register d-sm-block  d-md-none">Continue</button>
                        </div>
                        <div>
                            <p class="text-center text-sm-left">Or continue with:</p>
                            <p class="text-sm-left text-center">
                                <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/apple.svg')}}" alt="" srcset=""></a>
                                <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/google.svg')}}" alt="" srcset=""></a>
                                <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/facebook.svg')}}" alt="" srcset=""></a>
                                <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/twitter.svg')}}" alt="" srcset=""></a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1  d-sm-none d-none d-md-block"></div>
    </div>
</div>
