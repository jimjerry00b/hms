@extends('layouts.admin')
@section('title', 'Dashboard | Tenants')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Tenants</h5>

                    <a href="{{ route('tenants.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">House name</th>
                                <th scope="col">Flat no</th>
                                <th scope="col">Move in date</th>
                                <th scope="col">Move out date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenants as $tenant)                            
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>                                
                                <td>{{ $tenant->name }}</td>
                                <td>{{ $tenant->email }}</td>                                
                                <td>{{ $tenant->phone }}</td>
                                <td>{{ $tenant->house->name }}</td>
                                <td>
                                    @foreach($tenant->flat as $flatDetails)
                                    {{ $flatDetails->name }}
                                    @endforeach
                                </td>
                                <td>
                                    
                                    {{ ($tenant->move_in_date == null)? 'N/A' : date('l, F j, Y', strtotime($tenant->move_in_date))}}
                                </td>
                                <td>{{ ($tenant->move_out_date)? date('l, F j, Y', strtotime($tenant->move_out_date)) : 'N/A' }}</td>
                                <td>
                                    <div class="" role="group" aria-label="Basic outlined example">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('tenants.edit', $tenant->id) }}">Edit</a>
                                       
                                        <form class="d-inline" action="{{ route('tenants.destroy', $tenant->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete {{ $tenant->name }}?')">Delete</button>
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