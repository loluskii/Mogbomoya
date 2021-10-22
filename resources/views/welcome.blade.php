@extends('layouts.main') 
@section('css')
<style>
    .card{
        border-radius: 8px;
        border: none;
    }
    .card img{
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    img.card-img-top{
        height: 144px;
        max-width: 385px;
        object-fit: cover;
    }

    .icon{
        right: 24px;
        position: absolute;
        bottom: 130px;
        border: 50%;
        z-index: 99;
    }
    .save {
        background: white;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 50%;
    }
    .badge{
        position: absolute;
        top: 0;
        left: 0;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;
        padding: 10px;
        font-size: 14px;
        line-height: 16px;
        border-radius: 8px 0;
    }
    span.paid{
        background: #008A69;
        color: white;
    }
    span.free{
        background: #008A69;
        color: white;
    }

</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="jumbotron jumbotron-landing">
        <div class="container-fluid py-5 my-5">
            <h1 class="h2">Find events to attend</h1>
            <div class="col-md-4 col-sm-12 pl-0">
                <p>From virtual events to music concerts and business seminars, Mògbómoyá gives you access to a wide range of events tailored to suit your needs</p>
                <a class="btn cta-button btn-lg py-2 px-4" href="#browse" role="button">Browse Events</a>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5">
        <p class="text-muted">
            Find all events in
        </p>
        {{-- <input type="text" name="location" class="home-location" id=""> --}}
        <div class="mt-4" id="tabs">
            <ul class="nav nav-pills mb-3"  id="browse"> 
                <li class="nav-item">
                    <a  href="{{route('index.view')}}" class="nav-link mx-1 my-1 shadow-sm {{(request()->query('category')) ? '' : 'active'}}" aria-selected="true">All Events</a>
                </li>
                @foreach($interests as $interest)
                <li class="nav-item">
                    @if(request()->query('category'))
                        <a href="{{route('index.view',['category' => encrypt($interest->id)])}}" class="nav-link mx-1 my-1 shadow-sm ls-profile-tab  {{ decrypt(request()->query('category')) == $interest->id ? 'active' : 'bg-white'}}"> <img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""> {{$interest->name}}</a>
                    @else 
                        <a href="{{route('index.view',['category' => encrypt($interest->id)])}}" class="nav-link mx-1 my-1 bg-white shadow-sm ls-profile-tab"> <img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""> {{$interest->name}}</a>
                    @endif
                </li>
                @endforeach
            </ul>
            
            <div class="row py-4">
                @forelse ($events as $event)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow" >
                            <span class="badge {{ $event->isPaid == 0 ? 'free' : 'paid' }}">{{ $event->isPaid == 0 ? 'Free Event' : 'Paid Event' }}</span>
                            <span class="icon">
                                {{-- <a data-toggle="modal" data-target="#exampleModal"  class="btn save  shadow">
                                    <img src="{{ asset('images/share.svg') }}" srcset="">
                                </a>
                                <a data-toggle="modal" data-target="#exampleModal"  class="btn save  shadow">
                                    <img src="{{ asset('images/save.svg') }}" srcset="">
                                </a> --}}
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
                            </span>
                            <img src="{{asset("images/event/$event->featured_image")}}" class="card-img-top" alt="{{$event->name}}">
                            
                            <div class="card-body">
                                <a href="{{route('event.info', $event->reference)}}"><h5 class="text-dark font-weight-bold  card-title">{{$event->name}}</h5></a>
                                @if ($event->latitude)
                                    <p class="card-text mb-0 text-muted text-truncate"><i class="fa fa-map-marker "></i> <span class="font-weight-light">{{$event->location}}</span></p>
                                @else
                                    <p class="card-text mb-0 text-muted text-truncate"><i class="fa fa-link "></i> <span class="font-weight-light">{{$event->link}}</span></p>
                                @endif
                                <p class="card-text text-muted"> <i class="fa fa-clock-o"></i> <span class="font-weight-light"> {{\Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</span> | <span>{{\Carbon\Carbon::parse($event->time)->toTimeString()}}</span></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <p>Nothing to display.</p>
                    </div>
                @endforelse
                {{$events ?? ''->appends(request()->except('page'))->links()}}
            </div>
        </div>
    </div>
   @include('user.share-modal')

@endsection