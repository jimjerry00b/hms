@extends('layouts.admin')
@section('title', 'Dashboard | Add Electricity Info')
@section('content')

<div class="pagetitle">
        <h1>Flat Add</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Electricity Inf</li>
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
                        <form class="row g-3" action="{{ route('electricitys.store') }}" method="post">
                            @csrf

                            <div class="col-md-12">
                                <select name="flat_id" class="form-select">
                                    <option selected>Select...</option>
                                    @foreach($flats as $flat)
                                    <option value="{{ $flat->id }}">{{ $flat->name }}</option>
                                    @endforeach
                                </select>
                                @error('flat_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="col-md-12">
                                <input type="text" name="account_number" value="{{ old('account_number') }}" class="form-control" placeholder="account_number">
                                @error('account_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="text" name="meter_number" value="{{ old('meter_number') }}" class="form-control" placeholder="meter_number">
                                @error('meter_number')
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