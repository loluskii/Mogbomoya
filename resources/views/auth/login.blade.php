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
            <a href="/"><img src="{{ asset('images/side.svg') }}" alt="" srcset=""></a>
        </div>
        <div class="col-md-6">
            <div class="container p-5 mt-5">
                <h3 style="font-weight: bold">Welcome back!👋🏾</h3>
                <p class="text-muted">Hey there! We've missed you.</p>
                <form action="{{route('login')}}" method = "POST" class="pt-4">
                @csrf
                    <div class="col-sm-12 col-md-9 px-0">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <b>{{$message}}</b>
                            </span>
                        @enderror
                        <div class="form-group pb-3">
                            <label for="">username/email</label>
                            <input class="form-control form-control-lg" type="text" name="username" id="">
                        </div>
                        <div class="form-group pb-3">
                            <label for="">password</label>
                            <input class="form-control form-control-lg" type="password" name="password" id="">
                        </div>
                        <div class="form-row justify-content-between pb-4">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2 ml-1">
                                <input type="checkbox" name="remember" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label pt-1" for="customControlInline">Remember me</label>
                              </div>
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <a href="{{route('password.request')}}">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="py-4">
                            <button type="submit" class="btn btnPrimary d-sm-none d-none d-md-block">Continue</button>
                            <button type="submit" class="btn btn-block btnPrimary d-sm-block  d-md-none">Continue</button>
                        </div>
                        <div>
                            <p class="text-center text-sm-left">Or continue with:</p>
                            <p class="text-sm-left text-center">
                                {{-- <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/apple.svg')}}" alt="" srcset=""></a> --}}
                                <a href="{{ route('social.oauth', 'google') }}" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/google.svg')}}" alt="" srcset=""></a>
                                <a href="{{ route('social.oauth', 'facebook') }}" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/facebook.svg')}}" alt="" srcset=""></a>
                                {{-- <a href="" class="mr-3 mr-sm-2"><img src="{{asset('images/icons/twitter.svg')}}" alt="" srcset=""></a> --}}
                            </p>
                            <p class="text-sm-left text-center">Dont't have an account? <a href="/sign-up">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
