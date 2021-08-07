@extends('layouts.admin-main')

@section('content')
@include('layouts.partials.admin.top')
<div class="container-fluid mt-4 ">
<form action="{{route('admin.login')}}" method="POST">
@csrf
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" value="login">
</form>
</div>
@endsection