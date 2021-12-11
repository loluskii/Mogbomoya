@extends('events.main')
@section('css')
<style>
    .nav-tabs {
        border-bottom: none;
    }

    .nav-tabs a {
        width: 50%;
    }

    .select2-container--default .select2-selection--multiple {
        background-color: white;
        border-radius: 4px;
        cursor: text;
        height: calc(1.5em + 1rem + 2px);
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
            background-color: #e9e9e9;
            padding: 2px 5px 3px 5px;
            border: none;
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

    #tier {
        display: none;
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
    input[type=time],
    input::placeholder {
        font-size: 14px;
    }

    span {
        color: black;
    }

    #preview {
        height: 250px;
        width: 250px;
        object-fit: cover;
    }

    input[type=file] {
        display: none;
    }

    .upload {
        display: flex;
        border: 2px solid #ECEEEE;
        background-color: white;
        height: 180px;
        width: 204px;
        border-radius: 8px;
        align-items: center;
        font-size: 13px;
        cursor: pointer;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #fcfcfc;
        border: 1px solid rgb(220, 220, 220);
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 2px 5px;
    }

    .radio-label .icon {
        width: 20px;
        height: 20px;
        border: solid 2px #e3e3e3;
        border-radius: 50%;
        position: absolute;
        top: 10px;
        transition: .3s ease-in-out all;
        transform: scale(1);
        z-index: 1;
    }

    .radio-label .icon:before {
        content: "\f00c";
        position: absolute;
        width: 100%;
        height: 100%;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 12px;
        color: #000;
        text-align: center;
        opacity: 0;
        transition: .2s ease-in-out all;
        transform: scale(2);
    }
    .pac-item {
        padding: 10px;
        font-family: 'Sen', sans-serif;
    }

    .radio-label input:checked+.icon {
        background: #008A69;
        border-color: #008A69;
        transform: scale(1.0);
    }

    .radio-label input:checked+.icon:before {
        color: #fff;
        opacity: 1;
        transform: scale(.8);
    }

    .btnPrimaryOutline {
        color: black;
        border: 1px solid rgb(226, 226, 226)
    }


    @media only screen and (max-width: 600px) {

        #next,
        #create {
            width: 100%;
        }

        .span-text {
            font-size: 10px;
        }
    }
</style>

@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-4 col col-3 fixed-top one pl-0 d-md-block d-none d-sm-none">
            <img src="{{ secure_asset('images/side-bar.svg') }}" alt="">
        </div>
        <div class="col">
            @include('user.partial-nav')
            <div class="col-sm-12 col-md-9 col-lg-8 offset-sm-4 offset-md-4 pl-0">
                <div class="container py-3">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">
                                <p></p>
                                <div class="form-check form-check-inline pl-sm-2 pl-0">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="" id="basic"> <span
                                            class="text">Basic Details</span>
                                    </label>
                                </div>
                            </a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">
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
                        <form action="{{ route('event.create') }}" method="POST" class="form py-4"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    @include('layouts.partials.errors')
                                    <h4 style="font-weight: bold">Basic Information</h4>
                                    <p>Provide information about your event that would help users know why they should
                                        attend your event.</p>
                                    <div class="tab1">
                                        <div class="form-group py-2">
                                            <label for="">FEATURED IMAGE</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="file" name="featured_image" accept="image/*" id="imgInp"
                                                    class="featured_image">
                                                <div class="upload">
                                                    <div class="col my-auto text-center">
                                                        <img src="{{secure_asset('images/icons/Vector.svg')}}"
                                                            class="img-fluid" srcset="">
                                                        <p class="text-cen">Upload Featured Image</p>
                                                    </div>
                                                </div>
                                                <div class="py-2">
                                                    <img src="" alt="preview" class="img-fluid" id="preview">
                                                </div>
                                                @error('featured_image')
                                                <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-group py-2">
                                            <label for="">EVENT NAME</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="text" name="name" id="event-name"
                                                    class="form-control form-control-lg" placeholder="" required
                                                    value="{{ old('name') }}" aria-describedby="helpId">
                                                @error('name')
                                                <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group py-2">
                                            <label for="">INCLUDE A SHORT DESCRIPTION ABOUT YOUR EVENT</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <textarea class="form-control" name="description" required
                                                    value="{{ old('description') }}" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                                @error('description')
                                                <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group py-2">
                                            <div class="form-row">
                                                <div class="col-md-3 col-6">
                                                    <label for="">TIME</label>
                                                    <input type="time" name="time" required value="{{ old('time') }}"
                                                        class="form-control form-control-lg">
                                                    @error('time')
                                                    <b class="text-danger">{{ $message }} </b>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <label for="">DATE</label>
                                                    <input type="date" name="date" required value="{{ old('date') }}"
                                                        class="form-control form-control-lg">
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
                                                    <div class="form-check form-check-inline py-4 w-100"
                                                        style="border: 1px solid #ECEEEE; border-radius: 5px; background-color:white">
                                                        <label class="radio-label form-check-label px-3">
                                                            <input class="form-check-input virtualEvent" type="radio"
                                                                name="event_type" id="event-type" value="0"> Virtual
                                                            Event
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-6">
                                                    <div class="form-check form-check-inline  py-4 w-100"
                                                        style="border: 1px solid #ECEEEE; border-radius: 5px; background-color:white">
                                                        <label class="form-check-label px-3">
                                                            <input class="form-check-input liveEvent" type="radio"
                                                                name="event_type" id="event-type" value="1"> Physical
                                                            Event
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('event_type')
                                        <b class="text-danger">{{ $message }} </b>
                                        @enderror
                                        <div class="form-group py-2 liveLocation">
                                            <label for="">LOCATION</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="text" id="autocomplete" name="location"
                                                    value="{{ old('location') }}" class="form-control form-control-lg">
                                                @error('location')
                                                <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group py-2" id="latitudeArea">
                                            <label for="">LATITUDE</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="text" id="latitude" name="latitude"
                                                    class="form-control form-control-lg" placeholder=""
                                                    value="{{old('name')}}" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="form-group py-2" id="longtitudeArea">
                                            <label for="">LONGITUDE</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="text" name="longitude" id="longitude"
                                                    class="form-control form-control-lg" placeholder=""
                                                    value="{{old('name')}}" aria-describedby="helpId">

                                            </div>
                                        </div>
                                        <div class="form-group py-2 virtualLocation" style="display: none;">
                                            <label for="">WEBINAR LINK</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="text" name="link" placeholder="type link here" value=""
                                                    class="form-control form-control-lg">
                                                @error('location')
                                                <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">SELECT 1-3 CATEGORIES</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <select class="form-control form-control-lg" name="categories[]"
                                                    id="categories" multiple>

                                                    @foreach ($interests as $interest)
                                                    <option value="{{ $interest->id }}" data-icon="{{ secure_asset("images/icons/$interest->icon") }}">
                                                        {{ $interest->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('categories')
                                                <b class="text-danger">{{ $message }} </b>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group py-2">
                                            <label for="">EVENT TYPE (SELECT ONE)</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <div class="form-row d-flex align-items-stretch">
                                                    <div class="col-md-4 col-6">
                                                        <label
                                                            class=" radio-label btn btnPrimaryOutline bg-white pt-sm-4 pt-2 pb-sm-2 pb-1 px-sm-3 px-2"
                                                            style="text-align: left;">
                                                            <input type="radio" name="isPublic" value="0"
                                                                style="display: none">
                                                            <span class="icon"></span>
                                                            <p class="type pt-3 mb-0">Private Event</p>
                                                            <p class="text-dark span-text">Only people with the unique
                                                                link can see & register to attend</p>

                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-6">
                                                        <label
                                                            class="radio-label btn btnPrimaryOutline bg-white pt-sm-4 pt-2 pb-sm-2 pb-1 px-sm-3 px-2"
                                                            style="text-align: left">
                                                            <input type="radio" name="isPublic" value="1" name="options"
                                                                style="display: none">
                                                            <span class="icon"></span>
                                                            <p class="type pt-3 mb-0">Public Event</p>
                                                            <p class="text-dark span-text">Everyone on the app can see &
                                                                register to attend your event</p>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @error('isPublic')
                                        <b class="text-danger">{{ $message }} </b>
                                        @enderror
                                        <div class="py-4">
                                            <button type="button" class="btn btnPrimary" id="next">Continue</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <h4 style="font-weight: bold">Tickets & Pricing</h4>
                                    <p>Provide information about your ticket tiers and their pricing.</p>
                                    <div>
                                        <div class="form-group py-2">
                                            <label for="">IS THIS A PAID EVENT?</label>
                                            <div class="col-md-10 col-sm-12 pl-0">
                                                <input type="radio" name="isPaid" value="0"
                                                    onchange="showDiv('tier', this)">&nbsp;No<br />
                                                <input type="radio" name="isPaid" value="1"
                                                    onchange="showDiv('tier', this)">&nbsp;Yes, there are different
                                                tiers for this event
                                                {{-- <select class="form-control form-control-lg" name="isPaid"
                                                    onchange="showDiv('tier', this)">
                                                    <option value=" " selected> ---</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes, there are different tiers for this event
                                                    </option>
                                                </select> --}}
                                            </div>
                                        </div>
                                        @error('isPaid')
                                        <b class="text-danger">{{ $message }} </b>
                                        @enderror
                                        <div id="tier">
                                            <div class="tier-category">
                                                <div class="form-group py-2">
                                                    <label for="">TIER NAME</label>
                                                    <div class="col-md-10 col-sm-12 pl-0">
                                                        <input type="text" name="tier_name[]" id="tier-name"
                                                            class="form-control form-control-lg" placeholder=""
                                                            aria-describedby="helpId">
                                                        @error('tier_name')
                                                        <b class="text-danger">{{ $message }} </b>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group py-2">
                                                    <div class="form-row">
                                                        <div class="col-md-3 col-6">
                                                            <label for="">PRICE</label>
                                                            <input type="currency" name="tier_price[]"
                                                                class="form-control form-control-lg">
                                                            @error('tier_price')
                                                            <b class="text-danger">{{ $message }} </b>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <label for="">SET LIMITS (OPTIONAL)</label>
                                                            <input type="number" name="limit[]"
                                                                class="form-control form-control-lg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-sm-12 pl-0">
                                                    <hr class="my-2" style="border-style: dashed; width: auto;">
                                                </div>
                                                <div class="tier"></div>
                                            </div>
                                            <a onClick=countNumOfTier() class="btn btnSecondary" href="#"
                                                id="addNewTier"> <img src="{{ secure_asset('images/icons/plus.svg') }}" alt=""
                                                    srcset=""> Add a new
                                                tier</a>

                                        </div>
                                        <div class="py-4">
                                            <button type="submit" class="btn btnPrimary" id="create">Create
                                                Event</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_key') }}&libraries=places"></script>
<script>
    $('#preview').hide();
        $('.upload').click(function(){ $('.featured_image').trigger('click'); });
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file);
                $('#preview').show();
                $('.upload').css('display','none');
                // console.log()
            }
        }
        
        $form = $('.tab1'); // cache
        $form.find(':input[type="submit"]').prop('disabled', true); // disable submit btn
        $form.find(':input').change(function() { // monitor all inputs for changes
            var disable = false;
            $form.find(':input').not('[type="submit"],[type="hidden"]').each(function(i, el) { // test all inputs for values
                if ($.trim(el.value) === '') {
                    disable = true; // disable submit if any of them are still blank
                }
                // console.log(el)
            });
            $form.find(':input[type="submit"]').prop('disabled',disable);
        });


        let count = 0;
        function countNumOfTier(){
            count = count + 1
            // console.log(count);
            if(count > 2){
                document.getElementById('addNewTier').classList.add('disabled');
                alert('Maximun of 3 tiers!')
            }else{
                $('.tier').append("<div class='tier-category'><div class='form-group py-2'><label for=''>TIER NAME</label><div class='col-md-10 col-sm-12 pl-0'><input type='text' name='tier_name[]' id='tier-name' class='form-control form-control-lg' placeholder='' aria-describedby='helpId'></div></div><div class='form-group py-2'><div class='form-row'><div class='col-md-3 col-6'><label for=''>PRICE</label><input type='currency' name='tier_price[]' class='form-control form-control-lg'></div><div class='col-md-3 col-6'><label for=''>SET LIMITS (OPTIONAL)</label><input type='number' name='limit[]' class='form-control form-control-lg'></div></div></div></div><div class='col-md-10 col-sm-12 pl-0'><hr class='my-2' style='border-style: dashed; width: auto;'></div>"
                    )
            }
        }

        function showDiv(divId, element){
            document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
        }
        $(document).ready(function() {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");

            // $('#categories').select2({
            //     placeholder: 'Select a category',
            //     maximumSelectionLength: 3,
            //     templateResult: addUserPic,
            //     templateSelection: addUserPic
            // });
            $("#categories").select2({
        	  allowClear: true,
        	  templateResult: format,
        	  templateSelection: format
        	});
            function format(opt) {
        	  if (!opt.id) {
        	    return opt.text;
        	  }
        	  var optimage = $(opt.element).attr('data-icon'); 
        	//   console.log(optimage);
        	  if(!optimage){
                return option.text;
                } else {                    
                    var $opt = $(
                       '<span><img src="' + optimage + '" /> ' + opt.text + '</span>'
                    );
                    return $opt;
                }
        	};

            $('.virtualEvent').click(function() {
                $('.virtualLocation').show();
                $('.liveLocation').hide();
            })
            $('.liveEvent').click(function() {
                $('.virtualLocation').hide();
                $('.liveLocation').show();
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

        });

</script>




<script>
    google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            
            autocomplete.setComponentRestrictions({
              country: ["ng"],
            });


            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());

                // $("#latitudeArea").removeClass("d-none");
                // $("#longtitudeArea").removeClass("d-none");
            });
        }
</script>
@endsection