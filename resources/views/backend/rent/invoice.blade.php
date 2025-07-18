<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; max-width: 2480px; margin: 0 auto;}
        .header { text-align: center; margin-bottom: 20px; }
        .invoice-box { padding: 20px; border: 1px solid #ccc; }
        .footer { text-align: center; font-size: 12px; margin-top: 40px; }
    </style>
</head>
<body>
<div class="invoice-box">
    <div class="header">
        <h2>Rent Invoice <br>{{ $rent->house->address }}</h2>
        <p>Flat No : {{ $rent->tenant->flat_id }}</p>
        <p>{{ \Carbon\Carbon::parse($rent->month)->format('F Y') }}</p>
    </div>

    <p><strong>Name:</strong> {{ $rent->tenant->name }}</p>
    <p><strong>Phone:</strong> {{ $rent->tenant->phone }}</p>
    <p><strong>House:</strong> {{ $rent->house->address }}</p>

    <hr>

    <p><strong>House Rent:</strong> {{ number_format($rent->amount, 2) }} BDT</p>
    <p><strong>Water Bill:</strong> {{ number_format(800, 2) }} BDT</p>
    <hr>
    <p><strong>Total:</strong> {{ number_format($rent->amount + 800, 2) }} BDT</p>
    <p><strong>Status:</strong> {{ ucfirst($rent->status) }}</p>
    <p><strong>Payment Date:</strong> {{ $rent->payment_date ?? 'N/A' }}</p>

    <hr>

    <p><strong>Note:</strong><br>{{ $rent->note }}</p>

    <div class="footer">
        <p>Thank you for your payment!</p>
    </div>
</div>
</body>
</html>
