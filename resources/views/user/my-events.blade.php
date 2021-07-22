@extends('layouts.main') 
@section('css')
<style>
    a:hover{
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<div class="container-fluid my-5 py-5">
    <h3>My Events</h3>
    <div class="row py-4">
        @foreach ($events as $event)
            <div class="col-md-3">
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
        {{$events->links()}}
    </div>

</div>
@endsection

