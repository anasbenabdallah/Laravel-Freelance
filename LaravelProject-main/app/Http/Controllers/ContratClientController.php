<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrat;

class ContratClientController extends Controller
{
    public function index()
    {
        $contrats = Contrat::all(); // Récupérez toutes les offres depuis la base de données
        return view('contratsclient.index', compact('contrats'));
    }
}
