@extends('layouts.admin-main')

@section('content')
    @include('layouts.partials.admin.top')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.admin.side')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Users</h1>
                </div>

                @if ($users->count() > 0)
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $users->perPage() * ($users->currentPage() - 1) + $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number ?? 'N/A'}}</td>
                                        <td>{{ $user->country ?? 'N/A' }}</td>
                                        <td>{{ $user->isAdmin == 0 ? 'Normal User' : 'Admin' }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
                                            @if ($user->trashed())
                                                <a onclick="return confirm('Are you sure you want to delete this user?')"
                                                    class="btn btn-success btn-sm"
                                                    href="{{ route('admin.user.restore', $user->id) }}">Restore</a>
                                            @else
                                                <a onclick="return confirm('Are you sure you want to delete this user?')"
                                                    class="btn btn-danger btn-sm"
                                                    href="{{ route('admin.user.delete', $user->id) }}">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}

                    </div>
                @else
                    <span class="text-center">Nothing To Display.</span>
                @endif

            </main>
        </div>
    </div>
@endsection
