@extends('layouts.admin-main')

@section('content')
@include('layouts.partials.admin.top')
<div class="container-fluid">
    <div class="row">
        @include('layouts.partials.admin.side')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Events</h1>
            </div>

            @if ($events->count() > 0)
                <div class="row">
                    <table class="table table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Description</th>
                        <th scope="col">Time</th>
                        <th scope="col">Date</th>
                        <th scope="col">Event Type</th>
                        <th scope="col">Visibility</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Location/Link</th>
                        <th scope="col">Tiers</th>
                        <th scope="col">Interests</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{$events->perPage()*($events->currentPage()-1)+$loop->iteration}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->user->name}}</td>
                                <td>{{$event->description}}</td>
                                <td>{{($event->time)}}</td>
                                <td>{{$event->date}}</td>
                                <td>{{$event->event_type == 1 ? 'Physical' : 'Virtual'}}</td>
                                <td>{{$event->isPublic == 0 ? 'Private' : 'Public'}}</td>
                                <td>{{$event->isPaid == 0 ? 'Free Event' : 'Paid Event'}}</td>
                                <td>{{$event->location}}</td>
                                <td>
                                    @forelse ($event->tiers as $key => $tier)
                                        {{-- <div class="col-md-3"> --}}
                                            Name : {{$tier->name}}, Price : {{$tier->price}}, Limit : {{$tier->limit ?? 'N/A'}}, Slots Left:{{$tier->limit_remaining ?? 'N/A'}}
                                        {{-- </div> --}}
                                    @empty
                                        N/A
                                    @endforelse   
                                </td>
                                <td>
                                    @forelse ($event->interests as $key => $interest)
                                        {{-- <div class="col-md-3"> --}}
                                            {{$interest->name}}
                                        {{-- </div> --}}
                                    @empty
                                        N/A
                                    @endforelse   
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{route('admin.event.registrations', $event->id)}}">Registrations</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{$events->links('vendor.pagination.custom')}}

                </div>
            @else
                <span class="text-center">Nothing To Display.</span>
            @endif
            
        </main>        
    </div>
</div>
@endsection

