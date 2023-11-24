
@extends('layouts.me')

@section('content')
    <div class="container">
        <h1>Contract details</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Title:{{ $contrat->titre }}</h3>
                <p class="card-text">position: {{ $contrat->poste }}</p>
                <p class="card-text">start date:{{ $contrat->date_debut }}</p>
                <p class="card-text">end date:{{ $contrat->date_fin }}</p>
                <p class="card-text">salary:{{ $contrat->remuneration }}</p>
                <p class="card-text">comment: {{ $contrat->remarque }}</p>
                   

                <a href="{{ route('contrats.edit', $contrat->id) }}" class="btn btn-primary">edit</a>
    
                <form action="{{ route('contrats.destroy', $contrat->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat?')">delete</button>
                </form>
         
            </div>
        </div>

                   
                       
                       

                      
        


    </div>

@endsection
