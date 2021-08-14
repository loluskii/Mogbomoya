@extends('layouts.main') @section('css')
    <style>
        body {
            background-color: white;
        }
        label{
            font-size: 12px;
        }

        .follow {
            background-color: #E6F4F0;
            color: #008A69;
        }

        hr {
            color: #ECEEEE;
            width: auto;
            margin: 0
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
                    <img src="{{ asset("images/event/$event->featured_image") }}" style="max-height:800px;" alt="" srcset="">
                </div>
            </div>
            <div class="px-0 col-md-6 eventDetails">
                <div class="container">
                    <div class="card px-4 py-3 cardDetails" style="border: none">
                        <h3>{{$event->name}}</h3>
                        <p><span class="mr-4 text-muted">by {{$event->user->name}}</span></p>
                        <div class="row justify-content-between mb-4">
                            <div class="ml-3">
                                <a href="http://" class="btn save shadow" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('images/icons/analytics.svg') }}" srcset="">
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
                                <a href="http://" class="btn save shadow">
                                    <img src="{{ asset('images/icons/edit.svg') }}" srcset="">
                                </a>
                                <a data-toggle="modal" data-target="#exampleModal" class="btn save shadow">
                                    <img src="{{ asset('images/share.svg') }}" srcset="">
                                </a>
                                @include('user.share-modal')
                            </div>
                            
                        </div>
                        <div class="py-3">
                            <h5 style="font-weight: bold">Promote Event </h5>
                            <p>Target more users & increase your engagements.</p>
                        </div>
                        <center>
                            <hr class="my-0" width="640px">
                        </center>
                        <div class="container pl-0 mt-4 py-3">
                            <div class="pb-2">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-2"
                                        src="{{ asset('images/icons/calendar-black.svg') }}" srcset=""> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString()}}
                                </p>
                                <p class="ml-4 pl-3">{{ \Carbon\Carbon::parse($event->time)->toTimeString()}} WAT</p>
                                <p style="font-weight: bold; cursor: pointer;" class="ml-4 pl-3"><span style="color: #008A69;" data-toggle="modal" data-target="#updateTimeModal">Change date and time</span></p>
                            </div>
                            <div class="py-1">
                                <p class="mb-1" style="font-weight: bold"><img class="mr-3"
                                        src="{{ asset('images/icons/location-black.svg') }}" srcset=""> {{$event->location}}
                                </p>
                                {{-- <p class="ml-4 pl-3">Marina Road, Lagos Island, Lagos State, Nigeria</p> --}}
                                <p style="font-weight: bold;  cursor: pointer;" class="ml-4 pl-3"><span style="color: #008A69;" data-toggle="modal" data-target="#updateLocationModal">Change Location</span></p>
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
                        <div class="mt-3">
                                           
                            <div class="row justify-content-between">
                                @if($event->registrations->count()  > 1)
                                <p class="ml-3"><span>{{$event->registrations->count()}}</span> people are coming</p>
                            @endif
                            @if($event->registrations->count() == 1)
                                <p class="ml-3"><span>{{$event->registrations->count()}}</span> person is coming</p>
                            @endif 
                            @if($event->registrations->count() < 1)
                                <p class="ml-3"> No one has registered for this event</p>
                            @endif             
                                {{-- <div class="ml-3">
                                    <img src="{{ asset('images/icons/users/user-1.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/user-2.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/user-3.svg') }}" alt="" srcset="">
                                    <img src="{{ asset('images/icons/users/Group.svg') }}" alt="" srcset="">
                                </div> --}}
                                <div class="mr-3">
                                    <button class="ml-auto btn follow" data-toggle="modal" data-target="#sendNoteModal">Send a note to all registrants</button>
                                </div>
                            </div>
                            <p></p>
                            <div class="pt-4 pb-2 row">
                                <h5 class="font-weight-bold">About this event</h5>
                                <button class="ml-auto mr-3 btn follow" data-toggle="modal" data-target="#editDescriptionModal">Edit</button>
                            </div>
                           
                            <p class="eventDescription text-justified">
                                {{$event->description}}
                            </p>
                            
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

    </div>






    {{-- Send note to registrants Modal --}}
<div class="modal fade bd-example-modal-lg" id="sendNoteModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column" style="border-bottom: none">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <h5 class="modal-title" style="font-weight: bold">Send a note to all registrants </h5>
                <p class="mb-0"> Everyone whe registered for your event will be notified of your message.</p>
            </div>
            <hr>
            <div class="modal-body">
                <form action="{{route('event.send-note', $event->reference)}}" method="POST">
                    @csrf
                    <div class="container guestForm px-0">
                        <div class="form-group py-2">
                            <label for="">Message</label>
                            <textarea class="form-control form-control-lg" name="message" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btnPrimary">Send Message</button>
                    </div>
                </form>                        
            </div>

        </div>
    </div>
</div>

{{-- Cahnge date and time --}}
<div class="modal fade bd-example-modal-lg" id="updateTimeModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column" style="border-bottom: none">
                <h5 class="modal-title" style="font-weight: bold">Change date and time </h5>
                <p class="mb-0"> By changing the details of this event, a notification will be sent to registered attendees, with the updated information.</p>
            </div>
            <hr>
            <div class="modal-body">
                <form action="{{route('update.event-info', $event->reference)}}" method="POST">
                    @csrf
                    <div class="form-row pb-4">
                        <div class="col-md-6 col-6">
                            <label for="">DATE</label>
                            <input type="date" class="form-control form-control-lg" value="{{$event->date}}" name="date">
                        </div>
                        <div class="col-md-6 col-6">
                            <label for="">TIME</label>
                            <input type="time" class="form-control form-control-lg" value="{{$event->time}}" name="time">
                        </div>
                    </div>
                    <div class="py-4">
                        <button type="submit" class="btn btnPrimary">Update</button>
                    </div>
                </form>                        
            </div>

        </div>
    </div>
</div>

{{-- Cahnge date and time --}}
<div class="modal fade bd-example-modal-lg" id="updateLocationModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column" style="border-bottom: none">
                <h5 class="modal-title" style="font-weight: bold">Change event Location</h5>
                <p class="mb-0"> By changing the location, everyone that has registeredfor your event would get a notification.</p>
            </div>
            <hr>
            <div class="modal-body">
                <form action="{{route('update.event-info', $event->reference)}}" method="POST">
                    @csrf
                    <div class="form-row pb-4">
                        <div class="col-md-6 col-6">
                            <label class="btn border bg-white w-100 py-3" style="text-align: left;">
                                <input type="radio" name="isPublic" value="1" {{$event->isPublic == 1 ? 'checked' : ''}}> 
                                <span>
                                    Public Event
                                </span>
                            </label>
                        </div>
                        <div class="col-md-6 col-6">
                            <label class="btn border bg-white w-100 py-3" style="text-align: left;">
                                <input type="radio" name="isPublic" value="0" {{$event->isPublic == 0 ? 'checked' : ''}}> 
                                <span>
                                    Private Event
                                </span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="">LOCATION</label>
                      <input type="text" name="location" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="py-4">
                        <button type="submit" class="btn btnPrimary">Save Changes</button>
                    </div>
                </form>                        
            </div>

        </div>
    </div>
</div>




{{-- Edit event description  Modal --}}
<div class="modal fade bd-example-modal-lg" id="editDescriptionModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column" style="border-bottom: none">
                <h5 class="modal-title" style="font-weight: bold">Edit Event Description </h5>
            </div>
            <hr>
            <div class="modal-body">
                <form action="{{route('update.event-info', $event->reference)}}" method="POST">
                    @csrf
                    <div class="container guestForm px-0">
                        <div class="form-group py-2">
                            <label for="">DESCRIPTION</label>
                            <textarea class="form-control form-control-lg" name="description" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btnPrimary">Save Changes</button>
                    </div>
                </form>                        
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
            });
        }

    });
</script>
@endsection
