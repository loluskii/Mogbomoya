@extends('layouts.main')

@section('css')

<style id="compiled-css" type="text/css">
    span.msg,
    span.choose {
        color: #555;
        padding: 5px 0 10px;
        display: inherit
    }

    /*Styling Selectbox*/
    .dropdowns {
        width: 100%;
        display: inline-block;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 0 2px rgb(204, 204, 204);
        transition: all .5s ease;
        position: relative;
        font-size: 14px;
        color: #474747;
        text-align: left
    }

    .dropdowns .select {
        cursor: pointer;
        display: block;
        padding: 10px
    }

    .dropdowns .select>i {
        font-size: 13px;
        color: #888;
        cursor: pointer;
        transition: all .3s ease-in-out;
        float: right;
        line-height: 20px
    }

    .dropdowns:hover {
        box-shadow: 0 0 4px rgb(204, 204, 204)
    }

    .dropdowns:active {
        background-color: #f8f8f8
    }

    .dropdowns.active:hover,
    .dropdowns.active {
        box-shadow: 0 0 4px rgb(204, 204, 204);
        border-radius: 2px 2px 0 0;
        background-color: #f8f8f8
    }

    .dropdowns.active .select>i {
        transform: rotate(-90deg)
    }

    .dropdowns .dropdowns-menu {
        position: absolute;
        background-color: #fff;
        width: 100%;
        left: 0;
        margin-top: 1px;
        box-shadow: 0 1px 2px rgb(204, 204, 204);
        border-radius: 0 1px 2px 2px;
        overflow: hidden;
        display: none;
        max-height: 144px;
        overflow-y: auto;
        z-index: 9;
        min-width: 0;
    }

    .dropdowns .dropdowns-menu li {
        padding: 10px;
        transition: all .2s ease-in-out;
        cursor: pointer
    }

    .dropdowns .dropdowns-menu {
        padding: 0;
        list-style: none
    }

    .dropdowns .dropdowns-menu li:hover {
        background-color: #f2f2f2
    }

    .dropdowns .dropdowns-menu li:active {
        background-color: #e2e2e2
    }

    .dropdowns:focus-visible {
        outline: none;
    }

    .card-img-top {
        max-height: 150px;
    }

    .card-container {
        border: none;
        border-radius: 0;
    }

    @media screen and (max-width: 468px) {
        i.fa {
            display: none;
        }

        .dropdowns {
            white-space: nowrap;
            overflow: hidden;
        }

    }

    #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 99%;
        overflow: auto;
    }
</style>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row h-100">
        <div class="col-md-6 pl-0">
            <div class=" card card-container">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-4">
                            <div class="row">
                                <div class="col font-weight-bold">{{$events->count()}} event(s)</div>
                            </div>
                            <div class="row">
                                {{-- <div class="col"><small>Lekki, Lagos</small></div> --}}
                            </div>
                        </div>
                        <div class="col-8">
                            <form action="index.php" method="POST" id="signup">
                                <div class="row">
                                    <div class="col-5 pr-0">
                                        <div class="dropdowns">
                                            <div class="select">
                                                <span>Select Type</span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="type">
                                            <ul class="dropdowns-menu border-0">
                                                <li id="free">Free Event</li>
                                                <li id="paid">Paid Event</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="dropdowns">
                                            <div class="select">
                                                <span>Select Category</span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="category">
                                            <ul class="dropdowns-menu border-0">
                                                {{-- <li id="male">Male</li>
                                                <li id="female">Female</li> --}}
                                                @foreach ($interests as $interest)
                                                    <li id="{{ $interest->id }}">{{ $interest->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- <span class="msg"></span> -->
                                    </div>
                                    <div class="col-1 px-0">
                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-filter"></i></button>
                                    </div>            
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5">
                        @forelse ($events as $event)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <img src="{{ $event->featured_image }}" style="max-height: 300px;"
                                    class="card-img-top" alt="{{ $event->name }}">
                                <div class="card-body">
                                    <a href="{{ route('event.info', $event->reference) }}">
                                        <h5 class="text-dark  card-title">{{ $event->name }}</h5>
                                    </a>
                                    <p class="card-text mb-0 text-muted">{{ $event->location }}</p>
                                    <p class="card-text text-muted">
                                        <span>{{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</span> |
                                        <span>{{ \Carbon\Carbon::parse($event->time)->toTimeString() }} </span></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <p>No events to display.</p>
                        </div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0 vh-100">
            <div id="map">
            </div>
        </div>
    </div>
</div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-md-block">
                <section id="sidebar">
                    <form action="{{ route('search') }}" method="GET" class="mb-4">
                        <div class="py-4">
                            <div class="bg-white border filter1">
                                <h5 class="mb-2 p-3 rounded-top font-weight-bold">Event Type</h5>
                                <div class="container">
                                    <div class="form-inline border rounded p-sm-2 mb-2"> <input type="radio" value=""
                                        name="type" {{ request()->type == '' ? 0 : 1 }}> <label for=""
                                        class="pl-1 pt-sm-0 pt-1">Show All</label>
                                    </div>
                                    <div class="form-inline border rounded p-sm-2 mb-2"> <input type="radio" value="0"
                                            name="type" {{ request()->type == 0 ? 'checked' : '' }}> <label for=""
                                            class="pl-1 pt-sm-0 pt-1">Free Events</label>
                                    </div>
                                    <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" value="1"
                                            name="type" {{ request()->type == 1 ? 'checked' : '' }}> <label for=""
                                            class="pl-1 pt-sm-0 pt-1">Paid Events</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="bg-white border filter2">
                                <h5 class="mb-2 p-3 rounded-top font-weight-bold">Event Category</h5>
                                <div class="container" style="overflow:scroll; height: 25vh">
                                    @foreach ($interests as $interest)
                                        <div class="form-inline border rounded p-sm-2 mb-2"> <input type="radio"
                                                value="{{ $interest->id }}" name="category"
                                                {{ request()->category == $interest->id ? 'checked' : '' }}> <label for=""
                                                class="pl-1 pt-sm-0 pt-1">
                                                {{ $interest->name }}</label> 
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info btn-block mt-3" value="Filter" />
                    </form>

                </section>
            </div>
            <div class="col-md-9 pt-3 px-3 bg-white">
                <div class="col-12 d-md-none d-sm-block px-0 mb-3">
                    <div class="d-flex flex-row">
                        <form action="">
                            <select name="type" class="custom-select mr-2">
                                <option selected value="0">Free Events</option>
                                <option value="1">Paid Events</option>
                            </select>
                            <select class="custom-select mr-2">
                                @foreach ($interests as $interest)
                                    <option value="{{ $interest->id }}">{{ $interest->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" id="filterButton" class="btn filterButton btn-sm">
                                <span class="small align-items-center">
                                    <i class="fa fa-filter mr-1"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col">
                        <h5>{{$events->count()}} event(s) found<span></span></h5>
                    </div>
                </div>
                <div class="row py-4">
                    @forelse ($events as $event)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <img src="{{ $event->featured_image }}" style="max-height: 300px;"
                                    class="card-img-top" alt="{{ $event->name }}">
                                <div class="card-body">
                                    <a href="{{ route('event.info', $event->reference) }}">
                                        <h5 class="text-dark  card-title">{{ $event->name }}</h5>
                                    </a>
                                    <p class="card-text mb-0 text-muted">{{ $event->location }}</p>
                                    <p class="card-text text-muted">
                                        <span>{{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</span> |
                                        <span>{{ \Carbon\Carbon::parse($event->time)->toTimeString() }} </span></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <p>No events to display.</p>
                        </div>
                    @endforelse

                </div>


            </div>
        </div>
    </div> --}}

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    /*Dropdown Menu*/
    $('.dropdowns').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdowns-menu').slideToggle(300);
    });
    $('.dropdowns').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropdowns-menu').slideUp(300);
    });
    $('.dropdowns .dropdowns-menu li').click(function () {
        $(this).parents('.dropdowns').find('span').text($(this).text());
        $(this).parents('.dropdowns').find('input').attr('value', $(this).attr('id'));
    });
    /*End Dropdown Menu*/

    $('.dropdowns-menu li').click(function () {
        var input = '<strong>' + $(this).parents('.dropdowns').find('input').val() + '</strong>',
            msg = '<span class="msg">Hidden input value: ';
        $('.msg').html(msg + input + '</span>');
    });

</script>
@endsection
