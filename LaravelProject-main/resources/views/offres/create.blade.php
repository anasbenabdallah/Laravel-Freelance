@extends('layouts.me')

@section('content')
    <div class="container">
        <h1>Créer une nouvelle offre</h1>

        <form action="{{ route('offres.store') }}" method="POST">
            @csrf <!-- Inclure le jeton CSRF -->

            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="commentaire">Commentaire :</label>
                <textarea name="commentaire" id="commentaire" class="form-control @error('commentaire') is-invalid @enderror" required>{{ old('commentaire') }}</textarea>
                @error('commentaire')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="etudes">Mes études :</label>
                <input type="text" name="etudes" id="etudes" class="form-control @error('etudes') is-invalid @enderror" value="{{ old('etudes') }}" required>
                @error('etudes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="competences">Mes Compétences :</label>
                <input type="text" name= "competences" id="competences" class="form-control @error('competences') is-invalid @enderror" value="{{ old('competences') }}" required>
                @error('competences')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="periode">Période disponible :</label>
                <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode') }}" required>
                @error('periode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="remuneration">Rémunération :</label>
                <input type="number" name="remuneration" id="remuneration" class="form-control @error('remuneration') is-invalid @enderror" value="{{ old('remuneration') }}" required>
                @error('remuneration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="contrat_id">Sélectionnez un Contrat :</label>
                <select name="contrat_id" id="contrat_id" class="form-control @error('contrat_id') is-invalid @enderror">
                    <option value="">Sélectionnez un contrat</option>
                    @foreach($contrats as $contrat)
                        <option value="{{ $contrat->id }}">{{ $contrat->titre }}</option>
                    @endforeach
                </select>
                @error('contrat_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter l'offre</button>
        </form>
    </div>
@endsection