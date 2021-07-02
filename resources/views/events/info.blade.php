@extends('layouts.main') @section('css')
<style>
    body {
        background-color: white;
    }
    
    .follow {
        background-color: #E6F4F0;
        color: #008A69;
    }
    
    .register {
        background-color: #008A69;
        color: #fff;
        padding: 8px 32px;
    }
    
    hr {
        color: #ECEEEE;
        width: auto;
    }
    
    .save {
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 50%;
    }
    
    a {
        text-decoration: none;
        color: #008A69;
    }
    
    p {
        color: #616B69;
    }
    
    @media screen and (max-width: 540px) {
        .eventDetails {
            margin-top: -250px;
        }
        .cardDetails {
            border-radius: 25px;
        }
    }
</style>
@endsection @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{asset('images/info-image.svg')}}" alt="" srcset="">
            </div>
        </div>
        <div class="px-0 col-md-6 eventDetails">
            <div class="container">
                <div class="card px-4 py-3 cardDetails" style="border: none">
                    <h3>2018 Annual Business Conference</h3>
                    <p><span class="mr-4 text-muted">by Eat Drink Lagos </span><button class="btn follow" disabled="disabled">Follow</button></p>
                    <div class="row justify-content-between mb-4">
                        <div class="ml-3">
                            <a href="http://" class="btn save shadow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('images/share.svg')}}" srcset="">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-2" href="#">Save to</a>
                                <a class="dropdown-item py-2" href="#">Shayo💃</a>
                                <a class="dropdown-item py-2" href="#">Marketing</a>
                                <a class="dropdown-item py-2" href="#">Crashers</a>
                                <a class="dropdown-item py-2" href="#">Racing</a>
                                <a class="dropdown-item py-2" href="#">Business</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-2" href="#">Done</a>
                            </div>
                            <a href="http://" class="btn save shadow">
                                <img src="{{asset('images/save.svg')}}" srcset="">
                            </a>
                        </div>
                        <div class="mr-3">
                            <button class="btn register" data-toggle="modal" data-target="#exampleModal">Register</button>
                        </div>
                    </div>
                    <center>
                        <hr class="my-0" width="640px">
                    </center>
                    <div class="container pl-0 mt-4 py-3">
                        <div class="pb-2">
                            <p class="mb-1" style="font-weight: bold"><img class="mr-2" src="{{asset('images/icons/calendar-black.svg')}}" srcset=""> Friday, 29 Dec 2020</p>
                            <p class="ml-4 pl-3">12:00pm - 8:00pm WAT</p>
                            <p style="font-weight: bold" class="ml-4 pl-3"><a href="">Add to Calendar</a></p>
                        </div>
                        <div class="py-1">
                            <p class="mb-1" style="font-weight: bold"><img class="mr-2" src="{{asset('images/icons/location-black.svg')}}" srcset=""> Friday, 29 Dec 2020</p>
                            <p class="ml-4 pl-3">12:00pm - 8:00pm WAT</p>
                        </div>
                        <div class="py-1">
                            <p class="mb-1" style="font-weight: bold"><img class="mr-2" src="{{asset('images/icons/ticket-black.svg')}}" srcset=""> Friday, 29 Dec 2020</p>
                            <p class="ml-4 pl-3">12:00pm - 8:00pm WAT</p>
                        </div>

                    </div>
                    <center>
                        <hr class="" width="640px">
                    </center>
                    <div>
                        <p style="font-weight: bold"><span>393</span> people are coming</p>
                        <div class="row justify-content-between">
                            <div class="ml-3">
                                <img src="{{asset('images/icons/users/user-1.svg')}}" alt="" srcset="">
                                <img src="{{asset('images/icons/users/user-2.svg')}}" alt="" srcset="">
                                <img src="{{asset('images/icons/users/user-3.svg')}}" alt="" srcset="">
                                <img src="{{asset('images/icons/users/Group.svg')}}" alt="" srcset="">
                            </div>
                            <div class="mr-3">
                                <button class="ml-auto btn follow">Invite a Friend</button>
                            </div>
                        </div>
                        <p></p>
                        <h5>About this event</h5>
                        <p>#EatDrinkFestival is a food and drink festival organized by EatDrinkLagos, Lagos premier food and drink guide.
                        </p>
                        <p>Nigeria's leading celebration of food and drink sees thousands of food lovers come together to eat and drink from an extensive selection served up by some of the best chefs, restaurants, and street food vendors in Lagos. Now in
                            its fifth year, the team is taking #EatDrinkFestival to greater heights. In addition to bites and sips from a dynamic selection of Lagos' up and coming vendors, you'll find pop ups from celebrity chefs, aspiring chefs, and
                            hobbyist cooks.
                        </p>
                        <div class="pt-3 pb-5">
                            <button class="btn register" data-toggle="modal" data-target="#exampleModal">Register</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <p class="text-dark mb-0" style="font-weight: bold">Other events you may like:</p>
    </div>
    <div class="row flex-nowrap overflow-auto hideScrollbar pt-3 pb-5">
        <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
            <div class="card">
                <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Eat & Drink Festival</h5>
                    <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                    <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
            <div class="card">
                <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Eat & Drink Festival</h5>
                    <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                    <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
            <div class="card">
                <img src="{{asset('images/category-images/Rectangle.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Eat & Drink Festival</h5>
                    <p class="card-text mb-0 text-muted">Sterling Arena, Marina road, Lagos</p>
                    <p class="card-text text-muted"><span>Fri, 29 Dec 2020</span> | <span>1:20pm </span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-12 w-100">
            <div class="card">
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







<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header flex-column pr-5 mr-auto">
          <h5 class="modal-title" id="exampleModalLabel">Register for the 2018 Annual Business Conference <br>  </h5>
          <p class="mb-0"> Friday, 29 Dec 2020 by 12:00pm - 8:00pm WAT</p>
          
        </div>
        
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="mr-auto">
                        <h6>General Admission</h6>
                        <p>Free</p>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <select class="form-control" name="" id="">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                        </select>
                      </div>
                </div>
      
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection