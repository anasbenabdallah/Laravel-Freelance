<?php

namespace App\Http\Controllers;
use App\Contrat;

use Illuminate\Http\Request;

class ContratAdminController extends Controller
{
    public function index()
    {
        $contrats = Contrat::all(); // Récupérez toutes les offres depuis la base de données
        return view('contratsadmin.index', compact('contrats'));
    }
}
