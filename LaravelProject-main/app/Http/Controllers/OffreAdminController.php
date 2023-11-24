<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;

class OffreAdminController extends Controller
{
    public function index()
    {
        $offres = Offre::all(); // Récupérez toutes les offres depuis la base de données
        return view('offresadmin.index', compact('offres'));
    }

}
