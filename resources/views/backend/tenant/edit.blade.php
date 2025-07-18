@extends('layouts.admin')
@section('title', 'Dashboard | Tenant Edit')
@section('content')

<style>
    /* Style the image */
    .thumbnail {
      width: 200px;
      cursor: pointer;
      transition: 0.3s;
    }

    /* The lightbox background */
    .lightbox {
      display: none;
      position: fixed;
      z-index: 999;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.8);
    }

    /* The full-size image */
    .lightbox img {
      display: block;
      max-width: 90%;
      max-height: 90%;
      margin: 5% auto;
    }

    /* Close button */
    .lightbox:after {
      content: "×";
      position: absolute;
      top: 20px;
      right: 40px;
      color: white;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>

<div class="pagetitle">
        <h1>Tenant Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Tenant Edit</li>
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
                        <form class="row g-3" action="{{ route('tenants.update', $tenant->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="col-md-12">
                                <input type="text" name="name" value="{{ $tenant->name }}" class="form-control" placeholder="Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="email" name="email" value="{{ $tenant->email }}" class="form-control" placeholder="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">                                
                                <input type="number" name="phone" value="{{ $tenant->phone }}" class="form-control" placeholder="phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Photo</label>

                                @if($tenant->nid)
                                <img src="{{ asset($tenant->image) }}" class="thumbnail">
                                @endif

                                <input type="file" name="image" value="" class="form-control" placeholder="Image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>National ID Card</label>

                                @if($tenant->nid)
                                <img src="{{ asset($tenant->nid) }}" class="thumbnail" onclick="openLightbox()">

                                <div class="lightbox" id="lightbox" onclick="closeLightbox()">
                                    <img src="{{ asset($tenant->nid) }}" alt="Full Image">
                                </div>
                                @endif

                                <input type="file" name="nid" value="{{ $tenant->nid }}" class="form-control" placeholder="nid">
                                @error('nid')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Flat No.</label>
                                <select name="flat_id" class="form-select">
                                    <option value="">Select One</option>
                                    @foreach($flats as $flat)
                                    <option {{ ($flat->id == $tenant->flat_id)? 'selected' : '' }} value="{{ $flat->id }}">{{ $flat->name }} - {{ $flat->description }}</option>
                                    @endforeach
                                </select>
                                @error('flat_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            
                            <div class="col-md-12">
                                <select name="house_id" class="form-select">
                                    @foreach($houses as $house)
                                    <option value="{{ $house->id }}" {{ ($house->id == $tenant->house->id)? 'selected' : '' }} >{{ $house->name }}</option>
                                    @endforeach
                                </select>
                                @error('units')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Move in date</label>
                                <input type="date" name="move_in_date" value="{{ $tenant->move_in_date }}" class="form-control" placeholder="move_in_date">
                                @error('move_in_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Move out date</label>
                                <input type="date" name="move_out_date" value="{{ $tenant->move_out_date }}" class="form-control" placeholder="move_out_date">
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

<script>
  function openLightbox() {
    document.getElementById("lightbox").style.display = "block";
  }

  function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
  }
</script>
@endsection