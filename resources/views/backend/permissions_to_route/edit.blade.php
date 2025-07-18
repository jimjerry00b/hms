@extends('layouts.admin')
@section('title', 'Edit Assign Permissions to Role')
@section('content')


<div class="pagetitle">
    <h1>Edit Assign Permission to Role</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Assign Permission to Role</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Assign Permission to Role</h5>
                    <form class="row g-3" action="{{ route('permission_to_role.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                          <label for="" class="form-label">Role</label>
                          <select id="" name="role_id" class="form-select">
                                <option value="{{ $permissionToRole->role_id }}" selected>{{ $permissionToRole->role->name }}</option>
                          </select>
                          @error('role_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Permission</label>
                            <select id="" name="permission_id" class="form-select">
                                @foreach ($permissions as $permission)
                                <option {{ ($permission->id == $permissionToRole->permission_id)? 'selected' : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
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
