@extends('layouts.admin')
@section('title', 'Dashboard | Rents')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Rents</h5>

                    <div class="float-start">
                        <a href="{{ route('rents.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>
                    </div>

                    <div class="float-start">
                        <form method="GET" action="{{ route('rents.due-report') }}" class="mb-3 d-flex align-items-center">
                            <label class="mx-2">Status</label>
                            <select name="status" class="form-select mx-2">
                                <option value="0">All</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="partial">Partial</option>
                            </select>
                            <button class="btn btn-sm btn-primary mx-2">Filter</button>
                        </form>
                    </div>
                    
                    <div class="float-end">
                        <form method="GET" action="{{ route('rents.due-report') }}" class="mb-3">
                            <label>Select Month:</label>
                            <input type="month" name="month" value="" required>
                            <button class="btn btn-sm btn-primary">Filter</button>
                        </form>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tenant</th>
                                <th scope="col">House</th>
                                <th scope="col">Month</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rents as $rent)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>                                
                                <td>{{ $rent->tenant->name }}</td>
                                <td>{{ $rent->house->name }}</td>                                
                                <td>{{ $rent->month }}</td>
                                <td>{{ $rent->amount }}</td>
                                <td>{{ $rent->status }}</td>
                                <td>{{ ($rent->payment_date)? $rent->payment_date : 'N/A' }}</td>
                                <td>
                                    <div class="" role="group" aria-label="Basic outlined example">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('rents.bill-check', $rent->id) }}">Bill Check</a>
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('rents.invoice', $rent->id) }}">PDF Download</a>
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('rents.edit', $rent->id) }}">Edit</a>
                                       
                                        <!-- <form class="d-inline" action="{{ route('rents.destroy', $rent->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete {{ $rent->name }}?')">Delete</button>
                                        </form> -->
                                      </div>

                                </td>
                            </tr>

                            @empty
                            <tr><td colspan="8">No dues found for selected month.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->


                </div>
            </div>

        </div>
    </div>
</section>

@endsection