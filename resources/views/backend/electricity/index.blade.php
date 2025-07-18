@extends('layouts.admin')
@section('title', 'Dashboard | Electricity')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Electricity Bill</h5>

                    <a href="{{ route('electricitys.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>                                
                                <th scope="col">House</th>
                                <th scope="col">Flat</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">Meter Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($electricity_bills as $electricity_bill)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $electricity_bill->flat->house->name }}</td>
                                <td>{{ $electricity_bill->flat->name }}</td>
                                <td>{{ $electricity_bill->account_number }}</td>                                
                                <td>{{ $electricity_bill->meter_number }}</td>
                                <td>
                                    <div class="" role="group" aria-label="Basic outlined example">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('electricitys.edit', $electricity_bill->id) }}">Edit</a>
                                       
                                        <form class="d-inline" action="{{ route('electricitys.destroy', $electricity_bill->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete {{ $electricity_bill->account_number }}?')">Delete</button>
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