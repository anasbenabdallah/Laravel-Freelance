@extends('layouts.me')

@section('content')
    <h1>Edit contract</h1>
    <form action="{{ route('contrats.update', $contrat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Title :</label>
            <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ $contrat->titre }}" required>
            @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="poste">Poste :</label>
            <input type="text" name="poste" class="form-control @error('poste') is-invalid @enderror" value="{{ $contrat->poste }}" required>
            @error('poste')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_debut">Date de début :</label>
            <input type="date" name="date_debut" class="form-control @error('date_debut') is-invalid @enderror" value="{{ $contrat->date_debut }}" required>
            @error('date_debut')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class "form-group">
            <label for="date_fin">Date de fin :</label>
            <input type="date" name="date_fin" class="form-control @error('date_fin') is-invalid @enderror" value="{{ $contrat->date_fin }}" required>
            @error('date_fin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="remuneration">Rémunération :</label>
            <input type="number" name="remuneration" class="form-control @error('remuneration') is-invalid @enderror" value="{{ $contrat->remuneration }}" required>
            @error('remuneration')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="remarque">Remarque :</label>
            <textarea name="remarque" class="form-control @error('remarque') is-invalid @enderror">{{ $contrat->remarque }}</textarea>
            @error('remarque')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection