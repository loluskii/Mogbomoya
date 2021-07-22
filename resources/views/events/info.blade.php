@extends('layouts.main') @section('css')
    <style>
        body {
            background-color: white;
        }

        .follow {
            background-color: #E6F4F0;
            color: #008A69;
        }

        hr {
            color: #ECEEEE;
            width: auto;
        }

        .save {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 50%;
        }

        a {
            text-decoration: none;
            color: #008A69;
        }

        p {
            color: #616B69;
        }

        @media screen and (max-width: 540px) {
            .eventDetails {
                margin-top: -250px;
            }

            .cardDetails {
                border-radius: 25px;
            }
        }

    </style>
    @endsection @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset("images/event/$event->featured_image") }}" alt="" srcset="">
                </div>
            </div>
            <div class="px-0 col-md-6 eventDetails">
                <div class="container">
                    <div class="card px-4 py-3 cardDetails" style="border: none">
                        <h3>{{$event->name}}</h3>
                        <p><span class="mr-4 text-muted">by {{$event->user->name}} </span>
                            {{-- <button class="btn follow"
                                disabled="disabled">Follow</button> --}}
                        </p>
                        <div class="row justify-content-between mb-4">
                            <div class="ml-3">
                                <a href="http://" class="btn save shadow" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('images/save.svg') }}" srcset="">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item py-2" href="#">Save to</a>
                                    <a class="dropdown-item py-2" href="#">Shayo💃</a>
                                    <a class="dropdown-item py-2" href="#">Marketing</a>
                                    <a class="dropdown-item py-2" href="#">Crashers</a>
                                    <a class="dropdown-item py-2" href="#">Racing</a>
                                    <a class="dropdown-item py-2" href="#">Business</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item py-2" href="#">Done</a>
                                </div>
                                <a href="http://" class="btn save shadow">
                                    <img src="{{ asset('images/share.svg') }}" srcset="">
                                </a>
                            </div>
                            <div class="mr-3">
                                <button class="btn btnPrimary" data-toggle="modal"
                                data-target="{{ $event->isPaid == 0 ? '#freeEventRegisterModal' : '#paidEventRegisterModal'}}">Register</button>
                            </div>
                        </div>
                        <center>
                            <hr class="my-0" width="640px">
                        </center>
                        <div class="container pl-0 mt-4 py-3">
                            <div class="pb-2">
                            <p class="mb-1" style="font-weight: bold">
                                <img class="mr-2" src="{{ asset('images/icons/calendar-black.svg') }}" srcset=""> 
                                {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString()}}
                            </p>
                            <p class="ml-4 pl-3">{{ \Carbon\Carbon::parse($event->time)->toTimeString()}} WAT</p>
                                <p style="font-weight: bold" class="ml-4 pl-3"><a href="">Add to Calendar</a></p>
                            </div>
                            <div class="py-1">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-2"
                                        src="{{ asset('images/icons/location-black.svg') }}" srcset=""> Friday, 29 Dec 2020
                                </p>
                                <p class="ml-4 pl-3">12:00pm - 8:00pm WAT</p>
                            </div>
                            <div class="py-1">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-3"
                                        src="{{ asset('images/icons/location-black.svg') }}" srcset=""> {{$event->location}}
                                </p>
                            </div>
                            <div class="py-1">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-3"
                                        src="{{ asset('images/icons/ticket-black.svg') }}" srcset="">{{$event->isPaid == 0 ? 'Free Event' : 'Paid Event'}} 
                                </p>
                                <p class="ml-4 pl-3">Registration is required</p>
                            </div>
                        </div>
                        <center>
                            <hr class="" width="640px">
                        </center>
                        <div>
                            <p style="font-weight: bold"><span>393</span> people are coming</p>
                            <div class="row justify-content-between">
                                <div class="ml-3">
                                    <img src="{{ asset('images/icons/users/user-1.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/user-2.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/user-3.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/Group.svg') }}" alt="" srcset="">
                                </div>
                                <div class="mr-3">
                                    <button class="ml-auto btn follow">Invite a Friend</button>
                                </div>
                            </div>
                            <p></p>
                            <h5>About this event</h5>
                            <p>
                                {{$event->description}}
                            </p>
                           
                            <div class="pt-3 pb-5">
                                <button class="btn btnPrimary" data-toggle="modal"
                                    data-target="{{ $event->isPaid == 0 ? '#freeEventRegisterModal' : '#paidEventRegisterModal'}}">Register</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <p class="text-dark mb-0" style="font-weight: bold">Other events you may like:</p>
        </div>
        <div class="row flex-nowrap overflow-auto hideScrollbar pt-3 pb-5">
            <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
                <div class="card">
                    <img src="{{ asset('images/category-images/Rectangle.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Eat & Drink Festival</h5>
                        <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                        <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
                <div class="card">
                    <img src="{{ asset('images/category-images/Rectangle.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Eat & Drink Festival</h5>
                        <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                        <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
                <div class="card">
                    <img src="{{ asset('images/category-images/Rectangle.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Eat & Drink Festival</h5>
                        <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                        <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
                <div class="card">
                    <img src="{{ asset('images/category-images/Rectangle.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Eat & Drink Festival</h5>
                        <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                        <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>





{{-- General Event Modal --}}
    <div class="modal fade bd-example-modal-lg" id="freeEventRegisterModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-7 pl-4">
                        <div class="modal-header flex-column py-4 mr-auto" style="border-bottom: none">
                            <h5 class="modal-title" id="paidEventRegisterModalrModalLabel" style="font-weight: bold">Register for the 2018
                                Annual Business Conference <br> </h5>
                            <p class="mb-0"> Friday, 29 Dec 2020 by 12:00pm - 8:00pm WAT</p>
                        </div>
                        <hr style="width: auto;">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="mr-auto">
                                        <h6>General Admission</h6>
                                        <p>Free</p>
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <select class="custom-select form-control mx-3" name="" id="">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 bg-light px-0">
                        <div class="modal-header flex-column pt-0 pr-0"
                            style="background-image: url(../images/info-image.svg); background-position: center center; height: 250px;">
                            
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <h6 class="font-weight-bold">Order Summary</h6>
                                <div class="row justify-content-between text-muted my-4">
                                    <span class="ml-3">
                                        Free
                                    </span>
                                    <span class="mr-3">
                                        0.00
                                    </span>
                                </div>
                                <hr style="width: auto">
                                <div class="row justify-content-between text-muted  font-weight-bold my-4">
                                    <span class="ml-3">
                                        Total
                                    </span>
                                    <span class="mr-3">
                                        0.00
                                    </span>
                                </div>
                                <div class="pt-3 pb-5 float-right">
                                    <button class="btn btnPrimary " data-toggle="modal"
                                        data-target="#freeEventRegisterModal">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Paid Event Modal --}}
    <div class="modal fade bd-example-modal-lg" id="paidEventRegisterModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-7 pl-4">
                    <div class="modal-header flex-column py-4 mr-auto" style="border-bottom: none">
                        <h5 class="modal-title" id="freeEventRegisterModalLabel" style="font-weight: bold">Register for {{$event->name}}<br> </h5>
                        <p class="mb-0"> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString()}} by {{ \Carbon\Carbon::parse($event->time)->toTimeString()}} WAT</p>
                    </div>
                    <hr style="width: auto;">
                    <div class="modal-body">
                       
                            <div class="container ticketQuantity">
                                @foreach ($event->tiers as $tier)
                                    <div class="row">
                                        <div class="mr-auto">
                                            <h6>{{$tier->name}}</h6>
                                            <p>&#8358; {{$tier->price}}</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" max="{{$tier->limit_remaining ?? 100000000000000000}}" class="custom-select form-control form-control-lg mx-3" name="{{$tier->id}}">
                                            <b for=""><i>{{$tier->limit_remaining ?? 'Unlimited'}} slot(s) left</i></b>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- This particular section is for if the user is not signed in. If he's signed in after putting in the number of tickets, it should register auto. Else, it should ask for name and email. --}}
                            <div class="container guestForm"  style="display: none;">
                                <div class="form-group py-2">
                                    <div class="form-row">
                                        {{-- <div class="col-md-6 col-6">
                                            <label for="">FIRST NAME</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="First name" name="fnameGuest">
                                        </div> --}}
                                        <div class="col-md-6 col-6">
                                            <label for="">FULL NAME</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="Full Name" value="{{ auth()->user()->name}}" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    <label for="">EMAIL ADDRESS</label>
                                    <input type="email" name="email" id="event-name" class="form-control form-control-lg" placeholder="Email address" value="{{ auth()->user()->email}}" aria-describedby="helpId">
                                </div>
                            </div>
                            {{-- This particular section is for if the user is not signed in. If he's signed in after putting in the number of tickets, it should register auto. Else, it should ask for name and email. --}}
                    </div>
                </div>
                <div class="col-md-5 bg-light px-0">
                    <div class="modal-header flex-column pt-0 pr-0"
                        style="background-image: url(../images/info-image.svg); background-position: center center; height: 250px;">
                        {{-- <img src="{{asset('images/info-image.svg')}}" class="img-fluid" style=""> --}}
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h6 class="font-weight-bold">Order Summary</h6>
                            <div class="row justify-content-between text-muted my-4">
                                <span class="ml-3">
                                    Free
                                </span>
                                <span class="mr-3">
                                    £0.00
                                </span>
                            </div>
                            <hr style="width: auto">
                            <div class="row justify-content-between text-muted  font-weight-bold my-4">
                                <span class="ml-3">
                                    Total
                                </span>
                                <span class="mr-3">
                                    £<span class="totalPrice"></span>
                                </span>
                            </div>
                            <div class="pt-3 pb-5 float-right">
                                <button class="btn btnPrimary ctaButton">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        let user = false;
        let price = $('.priceValue').html();
        $("#vipQuantity").change(function(){
            var totalPrice = parseFloat($(this).children("option:selected").val()) * price;
            $('.totalPrice' ).append(totalPrice);
        });

        if(user){
            $('.ctaButton').text('Register');
        }else{
            $('.ctaButton').text('Continue');
            $('.ctaButton').click(function(){
                $('.ticketQuantity').hide();
                $('.guestForm').show();
                $(this).text('Register');
                $(this).attr("type","submit");
            });
        }

    });
</script>
@endsection
