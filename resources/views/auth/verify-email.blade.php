@extends('layouts.main') 
@section('content')
<div class="container-fluid">
    <div style="height: 45vh" class="jumbotron jumbotron-fluid">
        <div class="text-center">
            <h3 class="pb-4">Verification Is Required</h3>
            <h4 class="pb-4"><i>Thank you for signing up to use this platform , We are thrilled to have you here. Please do verify your email to explore our platform</i></h4>

            <form action="{{route('verification.send')}}" method="POST">
                @csrf
                <input type="submit" class="btn btn-success" value="Resend Verification Email">
            </form>
        </div>
    </div>
</div>
@endsection