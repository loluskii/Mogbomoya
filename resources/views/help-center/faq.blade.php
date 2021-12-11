@extends('layouts.help-center')
@section('css')
    <style>
        .form-control {
            display: inline-block;
        }
        .card{
            border: none;
        }
        h5,span.link{
        color: #008A69;
        font-weight: 700;
    }


    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="jumbotron jumbotron-terms">
            <div class="container-fluid py-4 my-4 text-center">
                <h1 class="h2 mb-4">Frequently Asked Questions</h1>
                <div class="form-row">
                    <div class="col-md-6 col-sm-10 col-lg-6 mx-auto">
                        <input class="form-control form-control-lg" type="search" placeholder="Search for questions"
                            aria-label="Search">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6 mb-sm-0 mb-3">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 pt-3">
                                <img src="{{secure_asset('images/icons/ticket.svg')}}" alt="" srcset="">
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Going to an event</h5>
                                <p class="card-text">In-depth articles and videos on attending an event</p>
        
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 pt-3">
                                <img src="{{secure_asset('images/icons/note.svg')}}" alt="" srcset="">
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Creating a new event</h5>
                                <p class="card-text">Helpful tips and tutorials on creating new events</p>
        
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 mb-sm-0 mb-3">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 pt-3">
                                <img src="{{secure_asset('images/icons/speaker.svg')}}" alt="" srcset="">
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Promoting an event</h5>
                                <p class="card-text">Learn how to promote an event and get more attendees</p>
        
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 pt-3">
                                <img src="{{secure_asset('images/icons/calendar.svg')}}" alt="" srcset="">
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Managing an event</h5>
                                <p class="card-text">In-depth articles and videos on managing your event</p>
        
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
