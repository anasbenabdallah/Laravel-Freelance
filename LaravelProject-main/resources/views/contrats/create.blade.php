@extends('layouts.me')

@section('content')
    <h1>Créer un Contrat</h1>
    <form action="{{ route('contrats.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" required>
            @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="poste">Position :</label>
            <input type="text" name="poste" class="form-control @error('poste') is-invalid @enderror" required>
            @error('poste')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_debut">Date de début :</label>
            <input type="date" name="date_debut" class="form-control @error('date_debut') is-invalid @enderror" required>
            @error('date_debut')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_fin">Date de fin :</label>
            <input type="date" name="date_fin" class="form-control @error('date_fin') is-invalid @enderror" required>
            @error('date_fin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="remuneration">Salaire :</label>
            <input type="number" name="remuneration" class="form-control @error('remuneration') is-invalid @enderror" required>
            @error('remuneration')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="remarque">Commentaire :</label>
            <textarea name="remarque" class="form-control @error('remarque') is-invalid @enderror"></textarea>
            @error('remarque')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection