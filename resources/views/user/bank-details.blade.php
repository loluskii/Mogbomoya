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
                <form action="{{ route('bank.store') }}" method="POST">
                    @csrf
                    <div class="col-md-10 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">SELECT BANK</label>
                            <select name="bank_name" id="bank" class="form-control form-control-lg" required>
                                <option value=" ">--Select Bank--</option>
                                @foreach ($banks['data'] as $bank)
                                    <option value="{{$bank['id']}}" {{($bank['id'] == ($myBank->bank_id ?? '')) ? 'selected' : ''}}>{{$bank['name']}}</option>
                                @endforeach
                            </select>
                            @error('bank_name')
                                <b class="text-danger">{{ $message }} </b>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12  px-sm-5 px-0">
                        <div class="form-group">
                            <label for="">ACCOUNT NUMBER</label>
                            <input type="text" name="account_number" id="" class="form-control form-control-lg" value="{{$myBank->acct_no ?? ''}}" placeholder="" aria-describedby="helpId">
                        </div>
                        @if ($myBank)
                            <span><b>{{$myBank->acct_name}} <i style="color: green; font-size:22px" class="fa fa-check-circle"></i></b></span>
                        @endif

                        @error('account_number')
                            <b class="text-danger">{{ $message }} </b>
                        @enderror
                    </div>
                    <div class="py-4 px-sm-5 px-0">
                        <button type="submit" class="btn register d-sm-none d-none d-md-block">{{ $myBank == null ? 'Validate Account' : 'Update Account'}}</button>
                        <button type="submit" class="btn btn-block register d-sm-block  d-md-none">{{ $myBank == null ? 'Validate Account' : 'Update Account'}}</button>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
</div>


@endsection