@extends('events.main') @section('css')
    <style>
        .nav-tabs {
            border-bottom: none;
        }

        .nav-tabs a {
            width: 50%;
        }

        .nav-tabs a.active,
        .nav-tabs a:hover,
        a:focus,
        .nav-tabs a.active .nav-tabs a:hover {
            border: 0;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            background-color: transparent;
        }

        .nav a p {
            border-bottom: none;
            border: 6px #008A69 solid;
            border-radius: 15px;

        }

        .form-control:focus {

            background-color: none;
            border-color: #008A69;
            outline: 0;
            box-shadow: none;
        }

        #basic,
        #details {
            transform: scale(1.5);
            color: #008A69;
        }

        span.text {
            font-weight: 700;
            color: #008A69;
        }

        .nav a:not(.active) p {
            border-color: #CCD1D0;
            color: #CCD1D0;
        }

        .nav a:not(.active) .form-check .form-check-label span.text {
            color: #CCD1D0;
        }

        .nav a:not(.active) .form-check .form-check-label input[type=radio] {
            color: #CCD1D0;
        }

        label {
            font-size: 11px;
        }
        .register {
            background-color: #008A69;
            color: #fff;
            padding: 8px 32px;
        }

    </style>

@endsection

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-3 fixed-top one pl-0 d-md-block d-none d-sm-none">
            <img src="{{ asset('images/side-bar.svg') }}" alt="">
        </div>
        <div class="col-sm-9 offset-sm-3 two">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                                <img src="{{ asset('images/icons/user-image.svg') }}" alt="" srcset=""> Appleseed John
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-3" href="#">Interests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-3" href="#"><img
                                        src="{{ asset('images/icons/account.svg') }}" class="px-2" alt="" srcset="">
                                    Account Settings</a>
                                <a class="dropdown-item py-3" href="{{ route('logout') }}"><img
                                        src="{{ asset('images/icons/logout.svg') }}" class="pr-2" alt="" srcset="">
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container py-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                            aria-controls="nav-home" aria-selected="true">
                            <p></p>
                            <div class="form-check form-check-inline pl-sm-2 pl-0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="" id="basic"> <span
                                        class="text">Basic Details</span>
                                </label>
                            </div>
                        </a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="false">
                            <p></p>
                            <div class="form-check form-check-inline pl-sm-2 pl-0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="" id="basic"> <span
                                        class="text">Tickets & Pricing</span>
                                </label>
                            </div>
                        </a>
                    </div>
                </nav>
                <div class="container-fluid">
                    <form action="" class="py-5">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <h4 style="font-weight: bold">Basic Information</h4>
                                <p>Provide information about your event that would help users know why they should
                                    attend your event.</p>
                                <div>
                                    <div class="form-group py-2">
                                        <label for="">EVENT NAME</label>
                                        <input type="text" name="" id="" class="form-control form-control-lg"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="">INCLUDE A SHORT DESCRIPTION ABOUT YOUR EVENT</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="form-group py-2">
                                        <div class="form-row">
                                            <div class="col-md-3 col-6">
                                                <label for="">TIME</label>
                                                <input type="text" class="form-control form-control-lg">
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label for="">DATE</label>
                                                <input type="text" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group py-2">
                                        <div class="form-row">
                                            <div class="col-md-3 col-6">
                                                <div class="form-check form-check-inline py-4 w-100"
                                                    style="border: 1px solid #ECEEEE; border-radius: 5px; background-color:white">
                                                    <label class="form-check-label px-3">
                                                        <input class="form-check-input" type="radio" name="type" id=""
                                                            value="1"> Virtual Event
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="form-check form-check-inline  py-4 w-100"
                                                    style="border: 1px solid #ECEEEE; border-radius: 5px; background-color:white">
                                                    <label class="form-check-label px-3">
                                                        <input class="form-check-input" type="radio" name="type" id=""
                                                            value="1"> Physical Event
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="">LOCATION</label>
                                        <input type="text" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group">
                                        <label for="">SELECT 1-3 CATEGORIES</label>
                                        <select class="form-control form-control-lg" name="" id="">
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group py-2">
                                        <div class="form-row">
                                            <div class="col-md-2 col-6">
                                                <div class="form-check bg-white py-3 pl-4 pr-4">
                                                    <input type="radio" class="form-check-input" name="eventType" id=""
                                                        value="checkedValue">
                                                    <label class="form-check-label">
                                                        <span style="font-weight: bold">Private</span><br>
                                                        Only people with the unique link can
                                                        see & register to attend.</label>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-6">
                                                <div class="form-check bg-white py-3 pl-4 pr-4">
                                                    <input type="radio" class="form-check-input" name="eventType" id=""
                                                        value="checkedValue">
                                                    <label class="form-check-label">
                                                        <span style="font-weight: bold">Public</span><br>
                                                        Everyone on the app can see and register to attend your
                                                        event.</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="py-4">
                                        <button class="btn register d-sm-none d-none d-md-block">Continue</button>
                                        <button class="btn btn-block register d-sm-block  d-md-none">Continue</button>
                                    </div>


                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <h4 style="font-weight: bold">Tickets & Pricing</h4>
                                <p>Provide information about your ticket tiers and their pricing.</p>
                                <div>
                                    <div class="form-group py-2">
                                        <label for="">IS THIS A PAID EVENT?</label>
                                        <input type="text" name="" id="" class="form-control form-control-lg"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="">TIER NAME</label>
                                        <input type="text" name="" id="" class="form-control form-control-lg"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // $('#nav-tab a').on('click', function (event) {
            //     event.preventDefault()
            //     $(this).tab('show')
            // })

        </script>
    @endsection
