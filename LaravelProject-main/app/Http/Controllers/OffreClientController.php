<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;

class OffreClientController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->input('sort', 'asc'); // Par défaut, tri croissant

    $query = Offre::query(); // Commencez une requête de base

    // Filtrage par rémunération minimale
    if ($request->has('salaire_min')) {
        $query->where('remuneration', '>=', $request->input('salaire_min'));
    }

   

    // Autres filtres - Ajoutez d'autres filtres selon vos besoins

    $offres = $query->orderBy('remuneration', $sort)->get(); // Tri et récupération des offres

    return view('offresclient.index', compact('offres'));
}

    


   /* public function show($id)
    {
        $offre = Offre::find($id); // Récupérez une offre spécifique en fonction de l'ID
        return view('offresclient.show', compact('offre'));
    }*/
}
