@extends('layouts.admin-main')

@section('content')
@include('layouts.partials.admin.top')
<div class="container-fluid">
    <div class="row">
        @include('layouts.partials.admin.side')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ucfirst($event->name)}} Registrations</h1>
            </div>

            @if ($registrations->count() > 0)
                <div class="row">
                    <table class="table table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Guests</th>
                        <th scope="col">Date/Time</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
                                <td>{{$registrations->perPage()*($registrations->currentPage()-1)+$loop->iteration}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$registration->email}}</td>
                                <td>{{$event->isPaid == 0 ? $registration->guests : $regisration->payment_records->count()}}</td>
                                <td>{{($registration->created_at)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{$registrations->links()}}

                </div>
            @else
                <span class="text-center">Nothing To Display.</span>
            @endif
            
        </main>        
    </div>
</div>
@endsection

