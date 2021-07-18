@extends('layouts.main') 
@section('css')
<style>
    li.tops{
        color: #008A69;
        font-weight: 700;
    }
    span{
        font-weight: bold;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="jumbotron jumbotron-terms">
        <div class="container-fluid py-3 my-5 text-center">
            <h1 class="h2">Site Map</h1>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <ul style="list-style-type: none">
                <li class="tops my-3">
                    The Mogbomoya App
                </li>
                <li class="my-3">Pricing</li>
                <li class="my-3">FAQ</li>
                <li class="my-3">Site Map</li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-12">
            <ul style="list-style-type: none">
                <li class="tops my-3">
                    Find Events
                </li>
                <li class="my-3">Online Webinars</li>
                <li class="my-3">Online Classes</li>
                <li class="my-3">Virtual Conferences</li>
                <li class="my-3">Festival and Concerts</li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-12">
            <ul style="list-style-type: none">
                <li class="tops my-3">
                    Legal
                </li>
                <li class="my-3">Community Guidelines</li>
                <li class="my-3">Terms of Use</li>
                <li class="my-3">Privacy Policy</li>
            </ul>
        </div>
    </div>
    
</div>
@endsection


