@extends('layouts.main') 


@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 pt-3 px-3 bg-white">
            <div class="row justify-content-between">
                <div class="col">
                    <h5>120 events found</h5>
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
                <div class="col-md-6 mb-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
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
        <div class="col-md-5">
            
        </div>
    </div>
</div>
@endsection