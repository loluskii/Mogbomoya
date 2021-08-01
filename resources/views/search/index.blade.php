@extends('layouts.main') 


@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <section id="sidebar" style="height: 100vh">
                <div class="py-4">
                    <div class="bg-white border" style="overflow:scroll; height: 23vh;">
                        <h5 class="mb-2 p-3 rounded-top font-weight-bold">Event Type</h5>
                        <div class="container" style="overflow:scroll; height: 40vh">
                            <form class="">
                                <div class="form-inline border rounded p-sm-2 mb-2"> <input type="radio" name="type" id="boring"> <label for="boring" class="pl-1 pt-sm-0 pt-1">Free Events</label> </div>
                                <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="type" id="ugly"> <label for="ugly" class="pl-1 pt-sm-0 pt-1">Paid Events</label> </div>
                            </form>
    
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-white border" style="overflow:scroll; height: 30vh;">
                        <h5 class="mb-2 p-3 rounded-top font-weight-bold">Event Category</h5>
                        <div class="container" style="overflow:scroll; height: 40vh">
                            <form class="">
                                {{-- @foreach($interests as $interest) --}}
                                {{-- <div class="form-inline border rounded p-sm-2 mb-2"> <input type="radio" name="interest" id=""> <label for="" class="pl-1 pt-sm-0 pt-1"><img src="{{asset("images/icons/$interest->icon")}}" alt="" srcset=""> {{$interest->name}}</label> </div> --}}
                                {{-- @endforeach --}}
                            </form>

    
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-9 pt-3 px-3 bg-white">
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
                <div class="col-md-3 mb-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card" >
                        <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Eat & Drink Festival</h5>
                            <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                            <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
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
       
    </div>
</div>
@endsection