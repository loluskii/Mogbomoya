@extends('layouts.admin-main')

@section('content')
@include('layouts.partials.admin.top')
<div class="container-fluid">
    <div class="row">
        @include('layouts.partials.admin.side')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit User</h1>
            </div>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button"vclass="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Oh snap! {{ $error }}</strong>
        </div>
    @endforeach
@endif


            <div class="row">
                <form action="{{route('admin.users.update', $user->id)}}" method="POST">
                    @csrf
                    <input type="text" name="name" value="{{$user->name}}" placeholder="Name">
                    @error('name')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                    <input type="text" name="username" value="{{$user->username}}" placeholder="Username">
                    @error('username')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                    <input type="email" name="email" value="{{$user->email}}" placeholder="Email">
                    @error('email')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                    <input type="text" name="phone_number" value="{{$user->phone_number ?? ''}}" placeholder="Phone">
                    @error('phone_number')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                    <select name="isAdmin" id="">
                        <option value="">-- Role --</option>
                        <option value="0" {{$user->isAdmin == 0 ? 'selected' : ''}}>Normal User</option>
                        <option value="1" {{$user->isAdmin == 1 ? 'selected' : ''}}>Admin</option>
                    </select>
                    @error('isAdmin')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                    <select name="isActive" id="">
                        <option value="">-- Active Status --</option>
                        <option value="0" {{$user->isActive == 0 ? 'selected' : ''}}>Deactivated</option>
                        <option value="1" {{$user->isActive== 1 ? 'selected' : ''}}>Activated</option>
                    </select>
                    @error('isActive')
                        <b class="text-danger">{{ $message }} </b>
                    @enderror
                    <input type="submit"/>
                </form>
            </div>
        </main>        
    </div>
</div>
@endsection

