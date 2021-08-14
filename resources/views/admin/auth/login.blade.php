@extends('layouts.admin-main')

@section('content')
@include('layouts.partials.admin.top')
<div class="container-fluid mt-5 ">
    <div class="d-flex justify-content-center">
        <div class="col-md-3 card card-body mt-5">
            <h4 class="text-center">Login</h4>
            <form action="{{route('admin.login')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="">Username/Email</label>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <input class="form-control btn btn-success btn-block" type="submit" value="login">
            </form>
        </div>
        
    </div>
    
</div>
@endsection