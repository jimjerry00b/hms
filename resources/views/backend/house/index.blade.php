@extends('layouts.admin')
@section('title', 'Dashboard | Houses')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Houses</h5>

                    <a href="{{ route('houses.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Units</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($houses as $house)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>                                
                                <td>{{ $house->name }}</td>
                                <td>{{ $house->address }}</td>
                                <td>{{ $house->unit }}</td>
                                <td>{{ $house->description }}</td>
                                <td>
                                    <div class="" role="group" aria-label="Basic outlined example">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('houses.edit', $house->id) }}">Edit</a>
                                       
                                        <form class="d-inline" action="{{ route('houses.destroy', $house->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete {{ $house->name }}?')">Delete</button>
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