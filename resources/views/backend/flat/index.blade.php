@extends('layouts.admin')
@section('title', 'Dashboard | Flats')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Flats</h5>

                    <a href="{{ route('tenants.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">House name</th>
                                <th scope="col">Rent</th>
                                <th scope="col">Electric A/C</th>
                                <th scope="col">Electric Meter No.</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flats as $flat)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>                                
                                <td>{{ $flat->name }}</td>
                                <td>{{ $flat->description }}</td>                                
                                <td>{{ $flat->house->address }}</td>
                                <td>{{ $flat->monthly_rent }}</td>
                                <td>{{ $flat->electricityBills->account_number }}</td>
                                <td>{{ $flat->electricityBills->meter_number }}</td>
                                <td>{{ ($flat->is_active == 1)? 'Active' : 'Inactive'}}</td>                                
                                <td>
                                    <div class="" role="group" aria-label="Basic outlined example">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('flats.edit', $flat->id) }}">Edit</a>
                                       
                                        <form class="d-inline" action="{{ route('flats.destroy', $flat->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete {{ $flat->name }}?')">Delete</button>
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