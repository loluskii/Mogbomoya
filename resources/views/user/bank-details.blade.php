@extends('layouts.account-nav') 
@section('css')
    <style>
        label{
            font-size: 12px;
        }
        .btn {
            background-color: #008A69;
            color: #fff;
            padding: 12px 32px;
        }
        .sidebar{
            background-color: #006554;
            height: 100vh;
        }
        .list-group-item {
            background-color: transparent;
            color: white;
            font-weight: bold;
        }


    </style>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
            @include('user.side-nav')

            <div class="container px-sm-5 px-2 mt-5 pt-3">
                <h3 class=" px-sm-5">My Account</h3>
                <p class=" px-sm-5">Manage your account details and public profile</p>
                <form action="">
                    <div class="col-md-10 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">SELECT BANK</label>
                            <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="col-md-10 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">ACCOUNT NUMBER</label>
                            <input type="text" name="" id="" class="form-control form-control-lg" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="py-4 px-sm-5 px-0">
                        <button class="btn register d-sm-none d-none d-md-block">Validate Account</button>
                        <button class="btn btn-block register d-sm-block  d-md-none">Validate Account</button>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
</div>


@endsection