@extends('layouts.admin')

@section('content')

<div class="col-lg-8 post-list">
    @foreach ($offres as $offre)
        <div class="single-post d-flex flex-row">
            <li class="list-group-item">
                <h3>{{ $offre->titre }}</h3>
                <p>Commentaire : {{ $offre->commentaire }}</p>
                <p>Études requises : {{ $offre->etudes }}</p>
                <p>Compétences nécessaires : {{ $offre->competences }}</p>
                <p>Période de travail : {{ $offre->periode }}</p>
                <p>Rémunération : {{ $offre->remuneration }}</p>
            </li>
        </div>
    @endforeach
</div>
@endsection
