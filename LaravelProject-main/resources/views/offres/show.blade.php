
@extends('layouts.me')

@section('content')
    <div class="container">
        <h1>Détails de l'offre</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $offre->titre }}</h3>
                <p class="card-text">Commentaire : {{ $offre->commentaire }}</p>
                <p class="card-text">Études requises : {{ $offre->etudes }}</p>
                <p class="card-text">Compétences nécessaires : {{ $offre->competences }}</p>
                <p class="card-text">Période de travail : {{ $offre->periode }}</p>
                <p class="card-text">Rémunération : {{ $offre->remuneration }}</p>

                <!-- Boutons alignés horizontalement -->
                <div class="d-flex">
                    <!-- Bouton pour supprimer l'offre -->
                    <form action="{{ route('offres.destroy', ['offre' => $offre->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mr-2">Supprimer l'offre</button>
                    </form>

                    <!-- Bouton pour éditer l'offre -->
                    <a href="{{ route('offres.edit', ['offre' => $offre->id]) }}" class="btn btn-primary mr-2">Éditer l'offre</a>

                    <!-- Bouton pour revenir à la liste des offres -->
                    <a href="{{ route('offres.index') }}" class="btn btn-secondary mr-2">Retour à la liste des offres</a>

                    

                </div>
            </div>
        </div>
    </div>
@endsection
