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
                    <a class="nav-link mx-1 my-1 active" id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-home" aria-selected="true">All Events</a>
                </li>
                @foreach($interests as $interest)
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-gambling" aria-selected="false"> <img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""> {{$interest->name}}</a>
                </li>
                @endforeach
            </ul>


            
            <div class="row py-4">
                <div class="col-md-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container text-center">
                <button type="button" class="btn btn-outline-secondary">Load More</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="">
        console.log('hello');
    </script>

    @endsection