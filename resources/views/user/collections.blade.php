@extends('layouts.main') 

@section('css')
<style>
    .card{
        background-color: transparent;
        border: 2px dashed #008A69;
    }
</style>
@endsection

@section('content')
    <div class="container py-5 ">
        <div class="row">
            <div class="col">
                <h1> Collections </h1>
                <div class="row my-5">
                    <div class="col-sm-4 col-md-3">
                        <div class="card">
                            <div class="card-body text-center p-5">
                                <div class="">
                                    <img src="{{asset('images/icons/plus.svg')}}" alt="" srcset="">
                                </div>
                            </div>
                        </div>
                        <p class="mt-2">Add new collection</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection