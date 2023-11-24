@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header">Edit Facture</div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('facture.update', $facture->id) }}" method="post">
                @csrf
                @method("PATCH")
                <div class="form-group">
                    <label for="client">Client</label>
                    <input type="text" name="client" id="client" value="{{ old('client', $facture->client) }}" class="form-control">
                    @error('client')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="caissier">Caissier</label>
                    <input type="text" name="caissier" id="caissier" value="{{ old('caissier', $facture->caissier) }}" class="form-control">
                    @error('caissier')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Montant">Montant</label>
                    <input type="text" name="Montant" id="Montant" value="{{ old('Montant', $facture->Montant) }}" class="form-control">
                    @error('Montant')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Etat">Etat</label>
                    <select name="Etat" id="Etat" class="form-control" required>
                        <option value="Pending" @if(old('Etat', $facture->Etat) == 'Pending') selected @endif>Pending</option>
                        <option value="Paid" @if(old('Etat', $facture->Etat) == 'Paid') selected @endif>Paid</option>
                    </select>
                    @error('Etat')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date', $facture->date) }}" class="form-control">
                    @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
