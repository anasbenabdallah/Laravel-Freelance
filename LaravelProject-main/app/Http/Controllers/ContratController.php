<?php

namespace App\Http\Controllers;

use App\Contrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function index()
    {
        $contrats = Contrat::all();
        return view('contrats.index', compact('contrats'));
    }

    public function create()
    {
        return view('contrats.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'poste' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'remuneration' => 'required|numeric|min:200', // Exemple : Minimum de 200
            'remarque' => 'nullable|string',
        ], [
            'titre.required' => 'Le champ "titre" est obligatoire.',
            'titre.max' => 'Le champ "titre" ne doit pas dépasser 255 caractères.',
            'date_fin.after' => 'La date de fin doit être postérieure à la date de début.',
            'remuneration.min' => 'La rémunération doit être d\'au moins 200.', // Message personnalisé pour le champ "remuneration"
        ]);

        Contrat::create($data);

        return redirect()->route('contrats.index');
    }

    public function show(Contrat $contrat)
    {
        return view('contrats.show', compact('contrat'));
    }

    public function edit(Contrat $contrat)
    {
        return view('contrats.edit', compact('contrat'));
    }

    public function update(Request $request, Contrat $contrat)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'poste' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'remuneration' => 'required|numeric|min:200', // Exemple : Minimum de 200
            'remarque' => 'nullable|string',
        ], [
            'titre.required' => 'Le champ "titre" est obligatoire.',
            'titre.max' => 'Le champ "titre" ne doit pas dépasser 255 caractères.',
            'date_fin.after' => 'La date de fin doit être postérieure à la date de début.',
            'remuneration.min' => 'La rémunération doit être d\'au moins 200.', // Message personnalisé pour le champ "remuneration"
        ]);

        $contrat->update($data);

        return redirect()->route('contrats.index');
    }

    public function destroy(Contrat $contrat)
    {
        $contrat->delete();

        return redirect()->route('contrats.index');
    }
}