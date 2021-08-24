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

        p a {
            text-decoration: none;
            color: #008A69;
        }

        p {
            color: #616B69;
        }
        .card img{
            object-fit: cover;
        }
        
        @media screen and (max-width: 540px) {
            .eventDetails {
                margin-top: -550px;
            }

            .cardDetails {
                border-radius: 25px;
            }
        }

    </style>
    @endsection @section('content')
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset("images/event/$event->featured_image") }}" style="max-height:800px;" alt="{{$event->name}}" srcset="">
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
                                <a href="#" class="btn save shadow" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('images/save.svg') }}" srcset="">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if($collections->count() > 0)
                                        <a class="dropdown-item py-2" href="#">Save to</a>
                                        @foreach ($collections as $collection)
                                            <a class="dropdown-item py-2" onclick="return confirm('Are you sure you want to proceed with this action?')" href="{{ route('event.add_to_collection', ['event_reference' => $event->reference, 'collection_reference' => $collection->reference]) }}">{{ $collection->name }}</a>
                                        @endforeach

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item py-2" href="#">Done</a>
                                    @else 
                                        <a class="dropdown-item py-2" href="#">No collections</a>
                                    @endif
                                </div>
                                <a data-toggle="modal" data-target="#exampleModal"  class="btn save shadow">
                                    <img src="{{ asset('images/share.svg') }}" srcset="">
                                </a>
                                @include('user.share-modal')
                                {{-- <span class="mr-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="btn btn-sm text-white" style="background-color: #3b5998" target="_blank"><i class="fa fa-facebook text-white"></i> Share</a>
                                </span>
                                <span class="mr-3">
                                <a href="whatsapp://send?text=Mogbomoya Event {{url()->current()}}" class="btn btn-sm text-white" style="background-color: #24d366" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp text-white"></i> Share</a>
                                </span>
                                <span class="mr-3">
                                <a href="https://twitter.com/intent/tweet?text=Mogbomoya Event {{url()->current()}}" class="btn btn-sm text-white" style="background-color: #00acee"  target="_blank"><i class="fa fa-twitter text-white"></i> Share</a>
                                </span> --}}
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
                                <p class="ml-4 pl-3 mb-1">{{ \Carbon\Carbon::parse($event->time)->toTimeString() }} WAT</p>
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
                            @if($event->registrations->count()  > 1)
                                <p style="font-weight: bold"><span>{{$event->registrations->count()}}</span> people are coming</p>
                            @endif
                            @if($event->registrations->count() == 1)
                                <p style="font-weight: bold"><span>{{$event->registrations->count()}}</span> person is coming</p>
                            @endif
                            <div class="row justify-content-between">
                                {{-- <div class="ml-3">
                                    <img src="{{ asset('images/icons/users/user-1.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/user-2.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/user-3.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/Group.svg') }}" alt="" srcset="">
                                </div> --}}
                                <div class="ml-3" data-toggle="modal" data-target="#inviteModal">
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
        @if ($similarEvents->count() > 0)
            <div class="container-fluid">
                <p class="text-dark mb-0" style="font-weight: bold">Other events you may like:</p>
            </div>
            <div class="row flex-nowrap overflow-auto hideScrollbar pt-3 pb-5">
                @foreach ($similarEvents as $event)
                <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
                    <div class="card" >
                        <img src="{{asset("images/event/$event->featured_image")}}" class="card-img-top" alt="{{$event->name}}">
                        <div class="card-body">
                            <a href="{{route('event.info', $event->reference)}}"><h5 class="text-dark  card-title">{{ $event->name }}</h5></a>
                            <p class="card-text mb-0 text-muted">{{$event->location}}</p>
                            <p class="card-text text-muted"><span>{{ \Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</span> | <span>{{ \Carbon\Carbon::parse($event->time)->toTimeString()}} </span></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        





    {{-- Free Event Modal --}}
    @include('events.free-event-modal')
    {{-- Paid Event Modal --}}
    @include('events.paid-event-modal')

    @include('events.invite-modal')

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.ctaButton').click(function() {
                $('.ticketQuantity').hide();
                $('.guestForm').show();
                $(this).hide();
                $('.submitButton').show();
            });

        });
    </script>
@endsection
