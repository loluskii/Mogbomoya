@extends('layouts.main')

@section('css')
<style>
    #sidebar{
        min-height: 80vh;
    }
    .filter1{
        min-height: 25px;
    }
    .filter2{
        overflow-y:scroll; 
        min-height: 30vh;
    }
    form{
        display: inherit;
    }
    .filterButton{
        background-color: #008A69;
        color: white;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid">
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
                        {{-- <p> <img src="{{asset('images/icons/location.svg')}}" style="height: " class="img-fluid">  <small>Lekki, Lagos</small> <a href="">Change</a></p> --}}
                    </div>
                </div>
                <div class="row py-4">
                    @forelse ($events as $event)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <img src="{{ asset("images/event/$event->featured_image") }}" style="max-height: 300px;"
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

@endsection
