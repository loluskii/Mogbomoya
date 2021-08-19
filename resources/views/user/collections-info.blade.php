@extends('layouts.main') 
@section('css')
<style>
    .collection{
        height: calc(100vh - 377px);
    }
    a:hover{
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<div class="collection container-fluid my-5 py-5">
    <h3>{{ $collection_name }}</h3>
    
    <div class="row py-4">
        @forelse ($event_collections as $event_collection)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset('images/event/'.$event_collection->event->featured_image)}}" class="card-img-top" alt="{{$event_collection->event->name}}">
                    <div class="card-body">
                        <a href="{{route('event.info', $event_collection->event->reference)}}"><h5 class="text-dark  card-title">{{ $event_collection->event->name }}</h5></a>
                        <p class="card-text mb-0 text-muted">{{$event_collection->event->location}}</p>
                        <p class="card-text text-muted"><span>{{ \Carbon\Carbon::parse($event_collection->event->date)->toFormattedDateString()}}</span> | <span>{{ \Carbon\Carbon::parse($event_collection->event->time)->toTimeString()}} </span></p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12 text-center">
                <p>Nothing to display.</p>
            </div>
        @endforelse
        {{$event_collections->links()}}
    </div>

</div>
@endsection

