@extends('layouts.admin-main')

@section('content')
@include('layouts.partials.admin.top')
<div class="container-fluid">
    <div class="row">
        @include('layouts.partials.admin.side')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Interests</h1>
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewInterestModal">
                    Add New Interest
                </button>
            </div>

            @if ($interests->count() > 0)
            <div class="row">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($interests as $interest)
                        <tr>
                            <td>{{$interests->perPage()*($interests->currentPage()-1)+$loop->iteration}}</td>
                            <td>{{$interest->name}}</td>
                            <td>
                                <img src="{{asset("images/icons/$interest->icon")}}" alt="{{$interest->name}}">
                            </td>
                            <td>
                                @include('admin.interests.update-interest-modal')
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal"
                                    data-target="#updateInterestModal{{$interest->id}}">Edit</a>
                                @if ($interest->trashed())
                                <a onclick="return confirm('Are you sure you want to delete this interest?')"
                                    class="btn btn-success btn-sm"
                                    href="{{route('admin.interest.restore', $interest->id)}}">Restore</a>
                                @else
                                <a onclick="return confirm('Are you sure you want to delete this interest?')"
                                    class="btn btn-danger btn-sm"
                                    href="{{route('admin.interest.delete', $interest->id)}}">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$interests->links('vendor.pagination.custom')}}

            </div>
            @else
            <span class="text-center">Nothing To Display.</span>
            @endif

        </main>
    </div>
</div>

@include('admin.interests.add-interest-modal')

@endsection