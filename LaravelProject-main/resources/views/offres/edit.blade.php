@extends('layouts.me')

@section('content')
    <div class="container">
        <h1>Modifier l'offre</h1>

        <form action="{{ route('offres.update', ['offre' => $offre->id]) }}" method="POST">
            @csrf <!-- Inclure le jeton CSRF -->
            @method('PUT') <!-- Utiliser la méthode HTTP PUT pour la mise à jour -->

            <div class="form-group">
                <label for="titre">Titre de l'offre</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre', $offre->titre) }}" required>
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="commentaire" class="form-control @error('commentaire') is-invalid @enderror" required>{{ old('commentaire', $offre->commentaire) }}</textarea>
                @error('commentaire')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="etudes">Études requises</label>
                <input type="text" name="etudes" id="etudes" class="form-control @error('etudes') is-invalid @enderror" value="{{ old('etudes', $offre->etudes) }}" required>
                @error('etudes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="competences">Compétences nécessaires</label>
                <input type="text" name="competences" id="competences" class="form-control @error('competences') is-invalid @enderror" value="{{ old('competences', $offre->competences) }}" required>
                @error('competences')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="periode">Période de travail</label>
                <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode', $offre->periode) }}" required>
                @error('periode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="remuneration">Rémunération</label>
                <input type="number" name="remuneration" id="remuneration" class="form-control @error('remuneration') is-invalid @enderror" value="{{ old('remuneration', $offre->remuneration) }}" required>
                @error('remuneration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour l'offre</button>
        </form>
    </div>
@endsection