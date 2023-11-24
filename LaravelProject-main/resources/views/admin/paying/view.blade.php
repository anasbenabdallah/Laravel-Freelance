@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Payment Details</div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $payment->id }}</p>
            <p><strong>Amount:</strong> ${{ $payment->amount }}</p>
            <p><strong>Payment Date:</strong> {{ $payment->payment_date }}</p>
            <p><strong>Facture ID:</strong> {{ $payment->facture_id }}</p>
            <p><strong>Created At:</strong> {{ $payment->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $payment->updated_at }}</p>
        </div>
    </div>
</div>
@endsection
