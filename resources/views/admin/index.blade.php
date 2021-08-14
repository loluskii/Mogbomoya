@extends('layouts.admin-main')

@section('content')
@include('layouts.partials.admin.top')
<style>
    .card-body{
        background: white;
        color: black;
    }
</style>
<div class="container-fluid">
    <div class="row">
        @include('layouts.partials.admin.side')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            
            <div class="row text-white">
                
                <div class="col-sm-4">
                    <div class="card-header text-center" style="background-color:rgb(122, 122, 238)">
                        <i class="fa fa-users p-4" style="font-size: 60px; color:white"></i>
                    </div>
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <h4>Users</h4>
                            </div>

                            <div class="col-md-6 text-right">
                                <h4 id="totalUsers" >0</h4>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="card-header text-center" style="background-color:rgb(70, 209, 35)">
                        <i class="fa fa-calendar p-4" style="font-size: 60px; color:white"></i>
                    </div>
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <h4>Events</h4>
                            </div>

                            <div class="col-md-6 text-right">
                                <h4 id="totalEvents" >0</h4>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="card-header text-center" style="background-color:rgb(228, 61, 186)">
                        <i class="fa fa-money p-4" style="font-size: 60px; color:white"></i>
                    </div>
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <h4>Transactions</h4>
                            </div>

                            <div class="col-md-6 text-right">
                                <h4 id="totalTransactions" >0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h3>Recent Users</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Date Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->username ?? 'N/A'}}</td>
                            <td>{{$user->created_at}}</td>
                            </tr>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>        
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.7.1/countUp.min.js"></script>
    <script>
        var countOptions = {
        useEasing: true,
        separator: ''
        }
        var count = new CountUp('totalUsers', 0, @json($totalUsers), 0, 5, countOptions)
        count.start();

        var count2 = new CountUp('totalEvents', 0, @json($totalEvents), 0, 5, countOptions)
        count2.start();

        var count3 = new CountUp('totalTransactions', 0, @json($totalTransactions), 0, 5, countOptions)
        count3.start();
    </script>
@endsection