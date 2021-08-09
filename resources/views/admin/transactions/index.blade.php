@extends('layouts.admin-main')

@section('content')
    @include('layouts.partials.admin.top')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.admin.side')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Transactions</h1>
                </div>

                @if ($transactions->count() > 0)
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Event Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Payment Log</th>
                                    <th scope="col">Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transactions->perPage() * ($transactions->currentPage() - 1) + $loop->iteration }}
                                        </td>
                                        <td>{{ $transaction->event_registration->event>name }}</td>
                                        <td>{{ $transaction->user->name }}</td>
                                        <td>{{ $transaction->email }}</td>
                                        <td>{{ $transaction->phone_number ?? 'N/A' }}</td>
                                        <td>{{ number_format($transaction->amount) }}</td>
                                        <td>{{ $transaction->description }}</td>
                                        <td>{{ $transaction->payment_log }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $transactions->links() }}

                    </div>
                @else
                    <span class="text-center">Nothing To Display.</span>
                @endif

            </main>
        </div>
    </div>
@endsection
