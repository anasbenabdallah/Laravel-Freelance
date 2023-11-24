@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header">Create New Facture</div>
        <div class="card-body">
            <form action="{{ route('facture.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="client">Client</label>
                    <input type="text" name="client" id="client" class="form-control @error('client') is-invalid @enderror" required>
                    @error('client')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="caissier">Caissier</label>
                    <input type="text" name="caissier" id="caissier" class="form-control @error('caissier') is-invalid @enderror" required>
                    @error('caissier')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Montant">Montant</label>
                    <input type="text" name="Montant" id="Montant" class="form-control @error('Montant') is-invalid @enderror" required>
                    @error('Montant')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Etat">Etat</label>
                    <select name="Etat" id="Etat" class="form-control @error('Etat') is-invalid @enderror" required>
                        <option value="Pending">Pending</option>
                        <option value="Paid">Paid</option>
                    </select>
                    @error('Etat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" required>
                    @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
