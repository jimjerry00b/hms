@extends('layouts.admin')
@section('title', 'Dashboard | Bill Generate')
@section('content')

<div class="pagetitle">
        <h1>Bill Generate</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Bill Generate</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bill Generate</h5>
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- No Labels Form -->
                        <form class="row g-3" action="{{ route('electric.bill.store') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <select name="house_id" class="form-select" id="houseSelect" data-url="{{ route('flat.list', ['id' => '__ID__']) }}">
                                    <option selected>Select...</option>
                                    @foreach($houses as $house)
                                    <option value="{{ $house->id }}">{{ $house->name }}</option>
                                    @endforeach
                                </select>
                                @error('house_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <select name="flat_id" class="form-select" id="flat_id" data-url="{{ route('flat.details', ['id' => '__ID__']) }}"></select>
                                @error('flat_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">
                                <input readonly type="text" name="electric_meter_id" id="electric_meter_id" value="" class="form-control" placeholder="electric_meter_id">
                                @error('electric_meter_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">
                                <input readonly type="text" name="account_number" id="account_number" value="" class="form-control" placeholder="account_number">
                                @error('account_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <input type="month" name="month_year" class="form-control" placeholder="Month Year">
                                @error('month_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="number" name="monthly_bill" class="form-control" placeholder="Month Bill">
                                @error('monthly_bill')
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

        const select = document.getElementById('houseSelect');
        const flatSelect = document.getElementById('flat_id');

        select.addEventListener('change', function() {
            const houseId = this.value;
            const urlTemplate = this.dataset.url;

            if (houseId) {
                const url = urlTemplate.replace('__ID__', houseId);

                fetch(url)
                    .then(response => response.json())
                    .then(result => {
                        
                        if (result.html) {
                            document.getElementById('flat_id').innerHTML = result.html;                            
                        } else {
                            document.getElementById('flat_id').innerHTML = '<p>No data found.</p>';
                        }
                    });
            }

        });

        if(flatSelect){
            flatSelect.addEventListener('change', function() {
                const flatId = this.value;
                const urlTemplate = this.dataset.url;
               
                if (flatId) {
                    const url = urlTemplate.replace('__ID__', flatId);

                    fetch(url)
                        .then(response => response.json())
                        .then(result => {
                            
                            if (result.account_number) {
                                document.getElementById('account_number').value = result.account_number;
                                document.getElementById('electric_meter_id').value = result.electric_meter_id;
                            } else {
                                //document.getElementById('flat_id').innerHTML = '<p>No data found.</p>';
                                console.error('error');
                            }
                        });
                }

            });
        }
        
    });
</script>
@endsection