@extends('layouts.app')
@section('styles')
<style>
    body {
        background-image: url('{{ asset('img/money.jpg') }}');
        background-size: cover;
        background-position: center;
    }
    .card {
    background-color: rgba(255, 255, 255, 0.8); /* Added a slight transparency to the card */
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="card" style="margin: 20px;">
        <h3 class="card-header">Payments List</h3>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Facture ID</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th> <!-- Add a new column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->facture_id }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>{{ $payment->updated_at }}</td>
                            <td>
                                <a href="{{ route('payment.edit', ['id' => $payment->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('payment.view', ['id' => $payment->id]) }}" class="btn btn-success">View</a>
                                <form method="post" action="{{ route('payment.delete', ['id' => $payment->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
