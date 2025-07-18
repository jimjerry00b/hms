@extends('layouts.admin')
@section('title', 'Assign Permissions to Role')
@section('content')


<div class="pagetitle">
    <h1>Assign Permission to Role</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Assign Permission to Role</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assign Permission to Role</h5>
                    <form class="row g-3" action="{{ route('permission_to_role.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                          <label for="" class="form-label">Role</label>
                          <select id="" name="role_id" class="form-select">
                                <option value="" selected>Select</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                          </select>
                          @error('role_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Permission</label>
                            <select id="" name="permission_id" class="form-select">
                                <option value="" selected>Select</option>
                                @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permission_id')
                             <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>

                        <div class="text-start">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
