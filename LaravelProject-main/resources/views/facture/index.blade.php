@extends('layouts.app')

@section('styles')
<style>
    body {
        background-image: url('{{ asset('img/background3.png') }}');
        background-size: cover;
        background-position: center;
    }
    .card {
    background-color: rgba(255, 255, 255, 0.9); /* Added a slight transparency to the card */
}
</style>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Factures</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('facture.create') }}" class="btn btn-success" title="Add New Facture">
                            Add Facture
                        </a>
                    </div>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('facture.index') }}">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="montantFilter">Filter by Montant:</label>
                                <select name="montantFilter" class="form-control">
                                    <option value="">All</option>
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 d-flex align-items-start">
                                <button type="submit" class="btn btn-primary mt-4">Filter</button>
                            </div>
                        </div>
                    </form>
                    
                </div
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('facture.index') }}">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input type="text" name="clientSearch" class="form-control" placeholder="Search by Client">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary mt-1">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-4">
                        <img src="{{ asset('img/factureee.jpg') }}" alt="Description" class="img-fluid">
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Caissier</th>
                                    <th>Montant</th>
                                    <th>Etat</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                    <th>Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($factures as $facture)
                                <tr>
                                    <td>{{ $facture->id }}</td>
                                    <td>{{ $facture->client }}</td>
                                    <td>{{ $facture->caissier }}</td>
                                    <td>{{ $facture->Montant }}</td>
                                    <td style="color: {{ $facture->Etat }}; background-color: {{ $facture->Etat === 'Paid' ? 'lightgreen' : 'lightcoral' }}">{{ $facture->Etat }}</td>
                                    <td>{{ $facture->date }}</td>
                                    <td>
                                        <a href="{{ route('facture.show', $facture->id) }}" title="View Facture">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </button>
                                        </a>
                                        <a href="{{ route('facture.edit', $facture->id) }}" title="Edit Facture">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ route('facture.destroy', $facture->id) }}"
                                            accept-charset="UTF-8" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Facture"
                                                onclick="return confirm('Confirm delete?')">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                            </button>
                                        </form>
                                    </td>

                                    <td colspan="10" style="text-align:right;">
                                        <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Surfing</a>
                                        @if($facture->Etat === 'Pending')
                                        <form action="{{ route('stripe.session', $facture->id) }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                                        </form>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
