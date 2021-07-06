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
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-gambling" aria-selected="false"> <img src="{{asset('images/icons/gambling.svg')}}" alt="" srcset=""> Gambling</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-contact-tab" data-toggle="pill" role="tab" aria-controls="pills-sports" aria-selected="false"> <img src="{{asset('images/icons/cycling.svg')}}" alt="" srcset=""> Outdoor Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 " id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-childcare" aria-selected="false"> <img src="{{asset('images/icons/childcare.svg')}}" alt="" srcset=""> Childcare</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-travel" aria-selected="false"> <img src="{{asset('images/icons/travel.svg')}}" alt="" srcset=""> Travel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-contact-tab" data-toggle="pill" role="tab" aria-controls="pills-security" aria-selected="false"> <img src="{{asset('images/icons/security.svg')}}" alt="" srcset=""> Cybersecurity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 " id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-politics" aria-selected="false"> <img src="{{asset('images/icons/politics.svg')}}" alt="" srcset=""> Politics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-lifestyle" aria-selected="false"> <img src="{{asset('images/icons/lifestyle.svg')}}" alt="" srcset=""> Lifestyle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-contact-tab" data-toggle="pill" role="tab" aria-controls="pills-weddings" aria-selected="false"> <img src="{{asset('images/icons/wedding.svg')}}" alt="" srcset=""> Weddings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 " id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-comedy" aria-selected="false"> <img src="{{asset('images/icons/comedy.svg')}}" alt="" srcset=""> Comedy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-fashion" aria-selected="false"> <img src="{{asset('images/icons/fashion.svg')}}" alt="" srcset=""> Fashion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 " id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-education" aria-selected="false"> <img src="{{asset('images/icons/education.svg')}}" alt="" srcset=""> Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-art" aria-selected="false"> <img src="{{asset('images/icons/art.svg')}}" alt="" srcset=""> Art</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-contact-tab" data-toggle="pill" role="tab" aria-controls="pills-food" aria-selected="false"> <img src="{{asset('images/icons/food.svg')}}" alt="" srcset=""> Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 " id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-media" aria-selected="false"> <img src="{{asset('images/icons/media.svg')}}" alt="" srcset=""> Media & Entertainment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-music" aria-selected="false"> <img src="{{asset('images/icons/music.svg')}}" alt="" srcset=""> Music</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-contact-tab" data-toggle="pill" role="tab" aria-controls="pills-design" aria-selected="false"> <img src="{{asset('images/icons/design.svg')}}" alt="" srcset=""> Design</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 " id="pills-home-tab" data-toggle="pill" role="tab" aria-controls="pills-business" aria-selected="false"> <img src="{{asset('images/icons/business.svg')}}" alt="" srcset=""> Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-religion" aria-selected="false"> <img src="{{asset('images/icons/religion.svg')}}" alt="" srcset=""> Religion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-contact-tab" data-toggle="pill" role="tab" aria-controls="pills-science" aria-selected="false"> <img src="{{asset('images/icons/science.svg')}}" alt="" srcset=""> Science</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-profile-tab" data-toggle="pill" role="tab" aria-controls="pills-sus" aria-selected="false"> <img src="{{asset('images/icons/sus.svg')}}" alt="" srcset=""> Sustainability</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 my-1 ls-contact-tab" data-toggle="pill" role="tab" aria-controls="pills-gaming" aria-selected="false"> <img src="{{asset('images/icons/gaming.svg')}}" alt="" srcset=""> eSports & Gaming</a>
                </li>
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