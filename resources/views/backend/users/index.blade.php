@extends('layouts.admin')
@section('title', 'Users')
@section('content')

<div class="pagetitle">
    <h1>Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Users</h5>

                    <a href="{{ route('user.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Type</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ ($users->currentPage()-1)* $users->perPage() + $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ ($user->is_active == 1)? "Active" : "Deactived" }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="" role="group" aria-label="Basic outlined example">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                        <a class="btn btn-outline-success btn-sm" href="">Ban User</a>

                                        @if($user->is_deletable == 1)
                                            <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')">Delete</button>
                                            </form>
                                        @endif
                                      </div>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->


                </div>
            </div>

        </div>
    </div>
</section>
@endsection
