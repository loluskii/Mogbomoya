@extends('events.main')
@section('css')
<style>
    body {
        margin: 0;
        overflow-y: auto;
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

    p a {
        text-decoration: none;
        color: #008A69;
        font-weight: bold;
    }

    a:hover {
        text-decoration: none;
        color: #008A69;
    }

    input::placeholder {
        font-size: 14px;
    }
</style>
@endsection

<div class="bg-light">
    <div class="row">
        <div class="col-md-4 d-sm-none d-none d-md-block">
            <a href="/"><img src="{{ secure_asset('images/side.svg') }}" alt="" srcset=""></a>
        </div>
        <div class="col-md-7">
            <div class="container p-5 mt-5">
                <h3 style="font-weight: bold">Welcome to Mogbomoya👋🏾</h3>
                <p class="text-muted">Already have an account? <a href="/login">Sign In</a></p>
                <form action="{{route('register')}}" method="POST" class="pt-4" autocomplete="off">
                    @csrf
                    <div class="col-sm-12 col-md-10 px-0">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group pb-2">
                                    <label for="">full name</label>
                                    <input class="form-control form-control-lg" placeholder="John Appleseed" type="text"
                                        name="name" required>
                                    @error('name')
                                    <b class="text-danger">{{ $message }} </b>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label for="">pick a username</label>
                                    <input class="form-control form-control-lg" placeholder="@appleseed" type="text"
                                        name="username" required>
                                    @error('username')
                                    <b class="text-danger">{{ $message }} </b>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group pb-2">
                                    <label for="">email address</label>
                                    <input class="form-control form-control-lg" placeholder="youremail@address.com"
                                        type="email" name="email" required>
                                    @error('email')
                                    <b class="text-danger">{{ $message }} </b>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-2">
                                    <label for="">phone number</label>
                                    <input class="form-control form-control-lg" placeholder="2349-012-3456"
                                        type="number" name="phone_number" required>
                                    @error('phone_number')
                                    <b class="text-danger">{{ $message }} </b>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group pb-2">
                            <label for="">password</label>
                            <input class="form-control form-control-lg" placeholder="**********" id="NewPassword" type="password" name="password" required>
                            @error('password')
                            <b class="text-danger">{{ $message }} </b>
                            @enderror
                            <div class="errorMsg d-none">
                                <div class="bg-light rounded py-2 pr-2 pl-0 mt-1">
                                    {{-- <div class="small font-weight-bold text-warning mb-1">Password Requirements</div> --}}
                                    <div class="d-flex align-items-start small">
                                        <span class="pt-1 pr-2"><i id="Length" class="fa fa-times text-danger"></i></span>
                                        <span>6 - 20 characters long</span>
                                    </div>
                                    <div class="d-flex align-items-start small my-1">
                                        <span class="pt-1 pr-2"><i id="Uppercase" class="fa fa-times text-danger"></i></span>
                                        <span>Must contain at least one uppercase letter</span>
                                    </div>
                                    <div class="d-flex align-items-start small">
                                        <span class="pt-1 pr-2"><i id="Lowercase" class="fa fa-times text-danger"></i></span>
                                        <span>Must contain at least one lowercase letter</span>
                                    </div>
                                    <div class="d-flex align-items-start small">
                                        <span class="pt-1 pr-2"><i id="Numbers" class="fa fa-times text-danger"></i></span>
                                        <span>Must contain at least one number</span>
                                    </div>
                                    <div class="d-flex align-items-start small">
                                        <span class="pt-1 pr-2"><i id="Symbols" class="fa fa-times text-danger"></i></span>
                                        <span>Must contain at least one symbol</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row justify-content-between pb-4">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2 ml-1">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" required>
                                <label class="custom-control-label pt-1" for="customControlInline">Accept terms and
                                    condition <sup>*</sup></label>
                            </div>

                        </div>
                        <div class="py-4">
                            <button type="submit" class="btn btnPrimary d-sm-none d-none d-md-block">Continue</button>
                            <button type="submit"
                                class="btn btnPrimary btn-block register d-sm-block  d-md-none">Continue</button>
                        </div>
                        <div>
                            <p class="text-center text-sm-left">Or continue with:</p>
                            <p class="text-sm-left text-center">
                                <a href="{{ route('social.oauth', 'google') }}" class="mr-3 mr-sm-2"><img
                                        src="{{secure_asset('images/icons/google.svg')}}" alt="" srcset=""></a>
                                <a href="{{ route('social.oauth', 'facebook') }}" class="mr-3 mr-sm-2"><img
                                        src="{{secure_asset('images/icons/facebook.svg')}}" alt="" srcset=""></a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1  d-sm-none d-none d-md-block"></div>
    </div>
</div>

@section('script')
<script>
    function ValidatePassword() {
        $('.errorMsg').removeClass('d-none');
        var rules = [
            {
                Pattern: "[A-Z]",
                Target: "Uppercase"
            },
            {
                Pattern: "[a-z]",
                Target: "Lowercase"
            },
            {
                Pattern: "[0-9]",
                Target: "Numbers"
            },
            {
                Pattern: "[!@@#$%^&*]",
                Target: "Symbols"
            }
        ];
        var password = $(this).val();

        $("#Length").removeClass(password.length > 6 ? "fa-times text-danger" : "fa-check text-success");
        $("#Length").addClass(password.length > 6 ? "fa-check text-success" : "fa-times text-danger");

        for (var i = 0; i < rules.length; i++) {
            $("#" + rules[i].Target).removeClass(new RegExp(rules[i].Pattern).test(password) ? "fa-times text-danger" : "fa-check text-success"); 
            $("#" + rules[i].Target).addClass(new RegExp(rules[i].Pattern).test(password) ? "fa-check text-success" : "fa-times text-danger");
        }
    }
    $(document).ready(function() {
        $("#NewPassword").on('keyup', ValidatePassword)
    });
</script>
@endsection