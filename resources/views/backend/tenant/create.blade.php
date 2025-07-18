@extends('layouts.admin')
@section('title', 'Dashboard | Tenant Add')
@section('content')

<div class="pagetitle">
        <h1>Tenant Add</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Tenant Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New</h5>
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- No Labels Form -->
                        <form class="row g-3" action="{{ route('tenants.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">                                
                                <input type="number" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Image/Photo</label>
                                <input type="file" name="image" value="{{ old('image') }}" class="form-control" placeholder="Image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>National ID Card</label>
                                <input type="file" name="nid" value="{{ old('nid') }}" class="form-control" placeholder="nid">
                                @error('nid')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Flat No.</label>
                                <select name="flat_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($flats as $flat)
                                    <option value="{{ $flat->id }}">{{ $flat->name }} - {{ $flat->description }}</option>
                                    @endforeach
                                </select>
                                @error('flat_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <select name="house_id" class="form-select">
                                    <option selected>Select...</option>
                                    @foreach($houses as $house)
                                    <option value="{{ $house->id }}">{{ $house->name }}</option>
                                    @endforeach
                                </select>
                                @error('units')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Move in date</label>
                                <input type="date" name="move_in_date" value="{{ old('move_in_date') }}" class="form-control" placeholder="move_in_date">
                                @error('move_in_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Move out date</label>
                                <input type="date" name="move_out_date" value="{{ old('move_out_date') }}" class="form-control" placeholder="move_out_date">
                                @error('move_out_date')
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