@extends('layouts.main') 
@section('content')
<div class="container-fluid">
    <div class="jumbotron jumbotron-landing">
        <div class="container-fluid py-5 my-5">
            <h1 class="h2">Find events to attend</h1>
            <div class="col-md-4 col-sm-12 pl-0">
                <p>From virtual events to music concerts and business seminars, Mògbómoyá gives you access to a wide range of events tailored to suit your needs</p>
                <a class="btn cta-button btn-lg py-2 px-4" href="#" role="button">Browse Events</a>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5">
        <p class="text-muted">
            Find all events in
        </p>
        <input type="text" name="location" class="home-location" id="">
        <div class="mt-4" id="tabs">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a  href="{{route('index.view')}}" class="nav-link mx-1 my-1 {{(request()->query('search')) ? '' : 'active'}}" aria-selected="true">All Events</a>
                </li>
                @foreach($interests as $interest)
                <li class="nav-item">
                    @if(request()->query('category'))
                        <a href="{{route('index.view',['category' => encrypt($interest->id)])}}" class="nav-link mx-1 my-1 ls-profile-tab  {{ decrypt(request()->query('category')) == $interest->id ? 'active' : ''}}"> <img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""> {{$interest->name}}</a>
                    @else 
                        <a href="{{route('index.view',['category' => encrypt($interest->id)])}}" class="nav-link mx-1 my-1 ls-profile-tab"> <img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""> {{$interest->name}}</a>
                    @endif
                </li>
                @endforeach
            </ul>
            
            <div class="row py-4">
                @forelse ($events as $event)
                    <div class="col-md-3">
                        <div class="card" >
                            <img src="{{asset("images/event/$event->featured_image")}}" class="card-img-top" alt="{{$event->name}}">
                            <div class="card-body">
                                <a href="{{route('event.info', $event->reference)}}"><h5 class="text-dark  card-title">{{$event->name}}</h5></a>
                                <p class="card-text mb-0 text-muted">{{$event->location}}</p>
                                <p class="card-text text-muted"><span>{{\Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</span> | <span>{{\Carbon\Carbon::parse($event->time)->toTimeString()}}</span></p>
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
@endsection