@extends('layouts.main') 
{{-- @section('css') --}}

@section('content')
<div class="container-fluid my-5 py-5">
    <h3>My Events</h3>
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

</div>
@endsection

