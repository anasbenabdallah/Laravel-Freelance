

@extends('layouts.me')


@section('content')
<div class="custom-header">
<img src="{{ asset('img/freelancer.jpg') }}" style="width: 100%; display: block;" >
<div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('offres.create') }}" style="display: inline-block; padding: 15px 30px; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; font-size: 18px; font-weight: bold;">Ajouter votre offre</a>
    </div>
    </div>
<div class="col-lg-8 post-list">
            @foreach ($offres as $offre)
            <div class="single-post d-flex flex-row">
            </div>
                <li class="list-group-item">
                    <h3>{{ $offre->titre }}</h3>
                    <p>Commentaire : {{ $offre->commentaire }}</p>
                    <p>Études requises : {{ $offre->etudes }}</p>
                    <p>Compétences nécessaires : {{ $offre->competences }}</p>
                    <p>Période de travail : {{ $offre->periode }}</p>
                    <p>Rémunération : {{ $offre->remuneration }}</p>
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">Voir les détails</a>
                </li>
            @endforeach
        
    </div>
@endsection 
