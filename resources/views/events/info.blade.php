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
                        <h3>{{ $event->name }}</h3>
                        <p><span class="mr-4 text-muted">by {{ $event->user->name }} </span>
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
                                    data-target="{{ $event->isPaid == 0 ? '#freeEventRegisterModal' : '#paidEventRegisterModal' }}">Register</button>
                            </div>
                        </div>
                        <center>
                            <hr class="my-0" width="640px">
                        </center>
                        <div class="container pl-0 mt-4 py-3">
                            <div class="pb-2">
                                <p class="mb-1" style="font-weight: bold">
                                    <img class="mr-2" src="{{ asset('images/icons/calendar-black.svg') }}" srcset="">
                                    {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}
                                </p>
                                <p class="ml-4 pl-3">{{ \Carbon\Carbon::parse($event->time)->toTimeString() }} WAT</p>
                                <p style="font-weight: bold" class="ml-4 pl-3"><a href="">Add to Calendar</a></p>
                            </div>
                            <div class="py-1">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-2"
                                        src="{{ asset('images/icons/location-black.svg') }}" srcset=""> Friday, 29 Dec
                                    2020
                                </p>
                                <p class="ml-4 pl-3">12:00pm - 8:00pm WAT</p>
                            </div>
                            <div class="py-1">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-3"
                                        src="{{ asset('images/icons/location-black.svg') }}" srcset="">
                                    {{ $event->location }}
                                </p>
                            </div>
                            <div class="py-1">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-3"
                                        src="{{ asset('images/icons/ticket-black.svg') }}"
                                        srcset="">{{ $event->isPaid == 0 ? 'Free Event' : 'Paid Event' }}
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
                                {{ $event->description }}
                            </p>

                            <div class="pt-3 pb-5">
                                <button class="btn btnPrimary" data-toggle="modal"
                                    data-target="{{ $event->isPaid == 0 ? '#freeEventRegisterModal' : '#paidEventRegisterModal' }}">Register</button>
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





    {{-- Free Event Modal --}}
    @include('events.free-event-modal')
    {{-- Paid Event Modal --}}
    @include('events.paid-event-modal')

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // let user = false;
            let price = $('.priceValue').html();
            $("#vipQuantity").change(function() {
                var totalPrice = parseFloat($(this).children("option:selected").val()) * price;
                $('.totalPrice').append(totalPrice);
            });

            $('.ctaButton').click(function() {
                $('.ticketQuantity').hide();
                $('.guestForm').show();
                $(this).hide();
                $('.submitButton').show();
            });

            // if (user) {
            //     $('.ctaButton').text('Register');
            // } else {
            //     $('.ctaButton').text('Continue');
            //     $('.ctaButton').click(function() {
            //         $('.ticketQuantity').hide();
            //         $('.guestForm').show();
            //         $(this).text('Register');
            //         $(this).attr("type", "submit");
            //     });
            // }

        });
    </script>
@endsection
