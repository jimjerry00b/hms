@extends('layouts.admin')
@section('title', 'Dashboard | House Edit')
@section('content')

<div class="pagetitle">
        <h1>House Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">House Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit</h5>
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- No Labels Form -->
                        <form class="row g-3" action="{{ route('houses.update', $house->id) }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <input type="text" name="name" value="{{ $house->name }}" class="form-control" placeholder="Your Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="address" style="height: 100px" placeholder="Address">{{ $house->address }}</textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">
                                <textarea class="form-control" name="description" style="height: 100px" placeholder="Description">{{ $house->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="number" name="units" value="{{ $house->unit }}" class="form-control" placeholder="Units">
                                @error('units')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form><!-- End No Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection