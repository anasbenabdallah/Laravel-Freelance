@extends('layouts.me')

@section('content')
<a href="{{ route('contrats.create') }}" class="btn btn-primary">Add contract</a>
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
                <th>Actions</th>
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
                    <td>
                        <a href="{{ route('contrats.show', $contrat->id) }}" class="btn btn-info">Details</a>
                        <a href="{{ route('contrats.edit', $contrat->id) }}" class="btn btn-primary"> Edit</a>
                        <form action="{{ route('contrats.destroy', $contrat->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat?')">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
