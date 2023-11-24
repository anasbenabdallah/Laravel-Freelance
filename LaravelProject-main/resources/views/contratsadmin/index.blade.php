@extends('layouts.admin')

@section('content')

<div class="card">
    <h1>Contracts</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>position</th>
                <th>start date</th>
                <th>end date </th>
                <th>salary </th>
                <th>comment </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($contrats as $contrat)
                <tr>
                    <td>{{ $contrat->titre }}</td>
                    <td>{{ $contrat->poste }}</td>
                    <td>{{ $contrat->date_debut }}</td>
                    <td>{{ $contrat->date_fin }}</td>
                    <td>{{ $contrat->remuneration }}</td>
                    <td>{{ $contrat->remarque }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
