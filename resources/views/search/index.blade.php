@extends('layouts.main') 


@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 pt-3 px-3 bg-white">
            <div class="row justify-content-between">
                <div class="col">
                    <h5>{{$events->count()}} event(s) found</h5>
                    <p> <img src="{{asset('images/icons/location.svg')}}" class="img-fluid">  <small>Lekki, Lagos</small> <a href="">Change</a></p>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <select class="custom-select">
                                <option selected value="free">Free Events</option>
                                <option value="paid">Paid Events</option>
                              </select>
                        </div>
                        <div class="col">
                            <select class="custom-select">
                                <option value="1">Media & Entertainment</option>
                                <option value="2">Gaming</option>
                                <option value="3">Career</option>
                              </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-4">               
                @forelse ($events as $event)
                    <div class="col-md-6 mb-3">
                        <div class="card" >
                            <img src="{{asset("images/event/$event->featured_image")}}" style="max-height: 300px;" class="card-img-top" alt="{{$event->name}}">
                            <div class="card-body">
                                <a href="{{route('event.info', $event->reference)}}"><h5 class="text-dark  card-title">{{ $event->name }}</h5></a>
                                <p class="card-text mb-0 text-muted">{{$event->location}}</p>
                                <p class="card-text text-muted"><span>{{ \Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</span> | <span>{{ \Carbon\Carbon::parse($event->time)->toTimeString()}} </span></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <p>No events to display.</p>
                    </div>
                @endforelse
                
            </div>
    
    
        </div>
        <div class="col-md-5">
            
        </div>
    </div>
</div>
@endsection