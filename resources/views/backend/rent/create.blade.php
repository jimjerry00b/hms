@extends('layouts.admin')
@section('title', 'Dashboard | Rent Add')
@section('content')

<div class="pagetitle">
    <h1>Rent Add</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Rent Add</li>
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
                    <form class="row g-3" action="{{ route('rents.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label>Tenant</label>
                            <select name="tenant_id" class="form-select" id="tenantSelect" data-url="{{ route('tenant.flat.details', ['id' => '__ID__']) }}">
                                <option selected>Select...</option>
                                @foreach($tenants as $tenant)
                                <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                @endforeach
                            </select>
                            @error('units')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="number" id="monthly_rent" name="monthly_rent" value="" class="form-control" placeholder="monthly rent">
                            @error('monthly_rent')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <input type="month" name="month" id="selectMonth" value="" class="form-control mb-2" required>
                            @error('month')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div class="col-md-12">
                            <input type="number" id="electric_bill" name="electric_bill" value="" class="form-control" placeholder="electric_bill">
                            @error('electric_bill')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="">Select...</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="partial">Partial</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="date" name="payment_date" class="form-control mb-2">
                            @error('payment_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <textarea name="note" class="form-control mb-2" placeholder="Note (optional)"></textarea>
                            @error('note')
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
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('tenantSelect');
        const month = document.getElementById('selectMonth');

        select.addEventListener('change', function() {
            const tenantId = this.value;
            const urlTemplate = this.dataset.url;

            if (tenantId) {
                const url = urlTemplate.replace('__ID__', tenantId);

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('monthly_rent').value = data.data.monthly_rent ?? 'N/A';
                    });
            }
        });


        month.addEventListener('change', function() {
            const month = this.value;
            
        });
    });
</script>
@endsection