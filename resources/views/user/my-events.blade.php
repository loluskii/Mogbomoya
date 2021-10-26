@extends('layouts.main')
@section('css')
<style>
    a:hover {
        text-decoration: none;
    }

    .card {
        height: 100%;
    }

    .card {
        border-radius: 8px;
        border: none;
    }

    .card img {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    img.card-img-top {
        height: 144px;
        max-width: 385px;
        object-fit: cover;
    }
</style>
@endsection

@section('content')
<div class="container-fluid my-5 py-5">
    <div class="mb-5">
        <h3>My Events</h3>

        <div class="row py-4">
            @forelse ($events as $event)
            <div class="col-md-3">
                <div class="card shadow">
                    <img src="{{$event->featured_image}}" style="max-height: 300px;" class="card-img-top"
                        alt="{{$event->name}}">
                    <div class="card-body">
                        <a href="{{route('event.info', $event->reference)}}">
                            <h5 class="text-dark  card-title">{{ $event->name }}</h5>
                        </a>
                        <p class="card-text mb-0 text-muted text-truncate">{{$event->location}}</p>
                        <p class="card-text text-muted"><span>{{
                                \Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</span> | <span>{{
                                \Carbon\Carbon::parse($event->time)->toTimeString()}} </span></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 text-center">
                <p>No events to display.</p>
            </div>
            @endforelse
            {{$events->links()}}
        </div>
    </div>

    <h3>Events you'll be attending</h3>

    <div class="row py-4">
        @forelse ($registeredEvents as $list )
        {{-- {{ dd($registeredEvents) }} --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow">
                @php
                $newImage = $list->event->featured_image;
                @endphp
                <img src="{{asset(" images/event/$newImage")}}" style="max-height: 300px;" class="card-img-top"
                    alt="{{$list->event->name}}">
                <div class="card-body">
                    <a href="">
                        <h5 class="text-dark  card-title">{{ $list->event->name }}</h5>
                    </a>
                    @if ($list->event->location)
                    <p class="card-text mb-0 text-muted text-truncate"><i class="fa fa-map-marker "></i>
                        {{$list->event->location}}</p>
                    @elseif ($list->event->link)
                    <p class="card-text mb-0 text-muted text-truncate"><i class="fa fa-link "></i>
                        {{$list->event->link}}</p>
                    @endif
                    <p class="card-text text-muted"><i class="fa fa-clock-o "></i> <span>{{
                            \Carbon\Carbon::parse($list->date)->toFormattedDateString()}}</span> | <span>{{
                            \Carbon\Carbon::parse($list->event->time)->toTimeString()}} </span></p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12 text-center">
            <p>No events to display.</p>
        </div>
        @endforelse
        {{$events->links()}}
    </div>

</div>
@endsection