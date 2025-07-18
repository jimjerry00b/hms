@extends('layouts.admin')
@section('title', 'Roles')
@section('content')

    <div class="pagetitle">
        <h1>Roles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Roles</h5>

                        <a href="{{ route('role.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $role->name }}</td>

                                        <td>
                                            <div class="" role="group" aria-label="Basic outlined example">
                                                <a class="btn btn-outline-primary btn-sm" href="{{ route('role.edit', $role->id) }}">Edit</a>

                                                <form class="d-inline" action="{{ route('role.destroy', $role->id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm" type="submit"
                                                        onclick="return confirm('Are you sure you want to delete {{ $role->name }}?')">Delete</button>
                                                </form>

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
