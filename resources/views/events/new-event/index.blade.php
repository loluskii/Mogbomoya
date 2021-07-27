@extends('events.main') @section('css')
<style>
    .nav-tabs {
        border-bottom: none;
    }
    
    .nav-tabs a {
        width: 50%;
    }
    
    .nav-tabs a.active,
    .nav-tabs a:hover,
    a:focus,
    .nav-tabs a.active .nav-tabs a:hover {
        border: 0;
    }
    
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        background-color: transparent;
    }
    
    .nav a p {
        border-bottom: none;
        border: 6px #008A69 solid;
        border-radius: 15px;
    }
    
    .form-control:focus {
        background-color: none;
        border-color: #008A69;
        outline: 0;
        box-shadow: none;
    }
    
    #basic,
    #details {
        transform: scale(1.5);
        color: #008A69;
    }
    
    span.text {
        font-weight: 700;
        color: #008A69;
    }
    
    .nav a:not(.active) p {
        border-color: #CCD1D0;
        color: #CCD1D0;
    }
    
    .nav a:not(.active) .form-check .form-check-label span.text {
        color: #CCD1D0;
    }
    
    .nav a:not(.active) .form-check .form-check-label input[type=radio] {
        color: #CCD1D0;
    }
    
    label {
        font-size: 11px;
    }
    
    input[type=date],
    input[type=time] {
        font-size: 14px;
    }
    span{
        color: black;
    }


    
    
    @media only screen and (max-width: 600px) {
        #next,
        #create {
            width: 100%;
        }
        .span-text{
            font-size: 10px;
        }
    }
</style>

@endsection 
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-3 fixed-top one pl-0 d-md-block d-none d-sm-none">
            <img src="{{ asset('images/side-bar.svg') }}" alt="">
        </div>
        <div class="col-sm-8 offset-sm-4 pl-0 ">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-4" style="padding-top: 15px">
                            <a class="nav-link" href="/help-center">Help Center </a>
                        </li>
                        <li class="nav-item dropdown pt-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('images/icons/user-image.svg')}}" alt="" srcset=""> {{auth()->user()->name}} 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-3" href="#">Interests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-3" href="#"><img src="{{ asset('images/icons/account.svg') }}" class="px-2" alt="" srcset=""> Account Settings</a>
                                <a class="dropdown-item py-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <img src="{{asset('images/icons/logout.svg')}}" class="pr-2" alt="" srcset=""> Logout
                                </a>
                      
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container py-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                            <p></p>
                            <div class="form-check form-check-inline pl-sm-2 pl-0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="" id="basic"> <span
                                        class="text">Basic Details</span>
                                </label>
                            </div>
                        </a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <p></p>
                            <div class="form-check form-check-inline pl-sm-2 pl-0">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="" id="basic"> <span
                                        class="text">Tickets & Pricing</span>
                                </label>
                            </div>
                        </a>
                    </div>
                </nav>
                <div class="container-fluid">
                    <form action="{{ route('event.create') }}" method="POST" class="py-5" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <h4 style="font-weight: bold">Basic Information</h4>
                                <p>Provide information about your event that would help users know why they should attend your event.</p>
                                <div>
                                    <div class="form-group py-2">
                                        @error('featured_image')
                                            <b class="text-danger">{{ $message }} </b>
                                        @enderror
                                        <input type="file" name="featured_image" class="featured_image" required>
                                        
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="">EVENT NAME</label>
                                        <div class="col-md-10 col-sm-12 pl-0">
                                            <input type="text" name="name" id="event-name" class="form-control form-control-lg" placeholder="" required value="{{old('name')}}" aria-describedby="helpId">
                                            @error('name')
                                                <b class="text-danger">{{ $message }} </b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="">INCLUDE A SHORT DESCRIPTION ABOUT YOUR EVENT</label>
                                        <div class="col-md-10 col-sm-12 pl-0">
                                            <textarea class="form-control" name="description" required value="{{old('description')}}" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            @error('description')
                                                <b class="text-danger">{{ $message }} </b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group py-2">
                                        <div class="form-row">
                                            <div class="col-md-3 col-6">
                                                <label for="">TIME</label>
                                                <input type="time" name="time" required value="{{old('time')}}" class="form-control form-control-lg">
                                                @error('time')
                                                    <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <label for="">DATE</label>
                                                <input type="date" name="date" required value="{{old('date')}}" class="form-control form-control-lg">
                                                @error('date')
                                                    <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="">WHAT TYPE OF EVENT IS THIS</label>
                                        <div class="form-row">
                                            <div class="col-md-4 col-6">
                                                <div class="form-check form-check-inline py-4 w-100" style="border: 1px solid #ECEEEE; border-radius: 5px; background-color:white">
                                                    <label class="form-check-label px-3">
                                                        <input class="form-check-input" type="radio" name="event_type" id="event-type"
                                                            value="0"> Virtual Event
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="form-check form-check-inline  py-4 w-100" style="border: 1px solid #ECEEEE; border-radius: 5px; background-color:white">
                                                    <label class="form-check-label px-3">
                                                        <input class="form-check-input" type="radio" name="event_type" id="event-type"
                                                            value="1"> Physical Event
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('event_type')
                                        <b class="text-danger">{{ $message }} </b>
                                    @enderror
                                    <div class="form-group py-2">
                                        <label for="">LOCATION</label>
                                        <div class="col-md-10 col-sm-12 pl-0">
                                            <input type="text" name="location" required value="{{old('location')}}" class="form-control form-control-lg">
                                            @error('location')
                                                <b class="text-danger">{{ $message }} </b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">SELECT 1-3 CATEGORIES</label>
                                        <div class="col-md-10 col-sm-12 pl-0">
                                            <select class="form-control form-control-lg" name="categories[]" id="categories" multiple>
                                                <option value=" " selected>-- Categories --</option>
                                                {{-- @foreach ($interests as $interest)
                                                    <option value="{{$interest->id}}">{{$interest->name}}</option>
                                                @endforeach --}}
                                            </select>
                                            @error('categories')
                                                <b class="text-danger">{{ $message }} </b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group py-2">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <div class="form-row">
                                                <div class="col-md-4 col-6">
                                                    <label class="btn btnPrimaryOutline bg-white pt-sm-4 pt-2 pb-sm-2 pb-1 px-sm-3 px-2" style="text-align: left;">
                                                      <input type="radio" name="isPublic" value="0" style="display: none"> 
                                                      <span>
                                                        Private Event
                                                      </span>
                                                      <p class="text-dark span-text">Only people with the unique link can see & register to attend</p>
                                            
                                                    </label>
                                                </div>
                                                <div class="col-md-4 col-6">
                                                    <label class="btn btnPrimaryOutline bg-white pt-sm-4 pt-2 pb-sm-2 pb-1 px-sm-3 px-2" style="text-align: left">
                                                      <input type="radio"  name="isPublic" value="1" name="options" style="display: none"> 
                                                      <span>Public Event</span>
                                                      <p class="text-dark span-text">Everyone on the app can see & register to attend your event</p>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @error('isPublic')
                                        <b class="text-danger">{{ $message }} </b>
                                    @enderror
                                    <div class="py-4">
                                        <button class="btn btnPrimary" id="next">Continue</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <h4 style="font-weight: bold">Tickets & Pricing</h4>
                                <p>Provide information about your ticket tiers and their pricing.</p>
                                <div>
                                    <div class="form-group py-2">
                                        <label for="">IS THIS A PAID EVENT?</label>
                                        <div class="col-md-10 col-sm-12 pl-0">
                                            <select class="form-control form-control-lg" name="isPaid">
                                                <option value=" " selected> -- IS THIS A PAID EVENT --</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('isPaid')
                                        <b class="text-danger">{{ $message }} </b>
                                    @enderror
                                    <div class="tier-category">
                                        <div class="form-group py-2">
                                            <label for="">TIER NAME</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="text" name="tier_name[]" id="tier-name" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                                                @error('tier_name')
                                                    <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group py-2">
                                            <div class="form-row">
                                                <div class="col-md-3 col-6">
                                                    <label for="">PRICE</label>
                                                    <input type="currency" name="tier_price[]" class="form-control form-control-lg">
                                                    @error('tier_price')
                                                        <b class="text-danger">{{ $message }} </b>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <label for="">SET LIMITS (OPTIONAL)</label>
                                                    <input type="number" name="limit[]" class="form-control form-control-lg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-12 pl-0">
                                            <hr class="my-2" style="border-style: dashed; width: auto;">
                                        </div>
                                        <div class="tier"></div>
                                    </div>
                                    <a class="btn btnSecondary" href="#" id="addNewTier"> <img src="{{asset('images/icons/plus.svg')}}" alt="" srcset=""> Add a new tier</a> <span class="bg-warning text-white">Maximum of 3 Tiers!</span>
                                    <div class="py-4">
                                        <button type="submit" class="btn btnPrimary" id="create">Create Event</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>conti
</div>

@endsection @section('script')
<script>
    $(document).ready(function(){

        $('#addNewTier').click(function(e) {
            e.preventDefault()
            $('.tier').append("<div class='tier-category'><div class='form-group py-2'><label for=''>TIER NAME</label><div class='col-md-10 col-sm-12 pl-0'><input type='text' name='tier_name[]' id='tier-name' class='form-control form-control-lg' placeholder='' aria-describedby='helpId'></div></div><div class='form-group py-2'><div class='form-row'><div class='col-md-3 col-6'><label for=''>PRICE</label><input type='currency' name='tier_price[]' class='form-control form-control-lg'></div><div class='col-md-3 col-6'><label for=''>SET LIMITS (OPTIONAL)</label><input type='number' name='limit[]' class='form-control form-control-lg'></div></div></div></div>")
        })
        $('#next').click(function(e) {
            e.preventDefault();
            var next_tab = $('.nav-tabs > .active').next('a');
            if (next_tab.length > 0) {
                next_tab.trigger('click');

            } else {
                $('.nav-tabs a:eq(0)').trigger('click');
            }
        });

        // function uploadImage() {
        //     var imgInp = document.getElementsByClassName('featured_image');
        //     var blah = document.getElementById('blah');

        //     imgInp.onchange = evt => {
        //         const [file] = imgInp.files
        //         if (file) {
        //             blah.src = URL.createObjectURL(file)
        //         }
        //     }

        // }


    })
</script>

@endsection