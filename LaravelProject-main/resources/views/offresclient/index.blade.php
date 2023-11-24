@extends('layouts.me')

@section('content')
<div class="custom-header">
    <div class="text-right">
        <form action="{{ route('offresclient.index') }}" method="GET">
            <button type="submit" name="sort" value="asc" class="btn btn-primary custom-button">Tri croissant</button>
            <button type="submit" name="sort" value="desc" class="btn btn-primary custom-button">Tri décroissant</button>
        </form>
    </div>
</div>

<div class="col-lg-8 post-list">
    <div class="offre-list">
        <form action="{{ route('offresclient.index') }}" method="GET">
            <div class="form-group">
                <label for="salaire_min">Rémunération minimale :</label>
                <input type="number" name="salaire_min" class="form-control" placeholder="Minimum">
            </div>

            

            <button type="submit" class="btn btn-primary custom-button">Filtrer</button>
        </form>

        @foreach ($offres as $offre)
            <div class="offre-item">
                <h3>{{ $offre->titre }}</h3>
                <p class="commentaire">{{ $offre->commentaire }}</p>
                <ul>
                    <li>Études requises: {{ $offre->etudes }}</li>
                    <li>Compétences nécessaires: {{ $offre->competences }}</li>
                    <li>Période de travail: {{ $offre->periode }}</li>
                    <li>Rémunération: {{ $offre->remuneration }}</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>

<style>
    .custom-button {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    .custom-button:hover {
        background-color: #2980b9;
    }

    .offre-item {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px 0;
    }

    .commentaire {
        font-style: italic;
    }
</style>
@endsection
