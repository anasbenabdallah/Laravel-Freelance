<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facture;

class FactureController extends Controller
{
    public function index(Request $request)
    {

        $query = Facture::query();

        // Search by client
        if ($request->has('clientSearch')) {
            $clientSearch = $request->input('clientSearch');
            $query->where('client', 'LIKE', "%$clientSearch%")
                  ->orWhere('client', 'LIKE', "%$clientSearch%", 'COLLATE utf8_general_ci');
        }
    
        // Filter by Montant
        if ($request->has('montantFilter')) {
            $montantFilter = $request->input('montantFilter');
            if ($montantFilter === 'asc') {
                $query->orderBy('Montant', 'asc');
            } elseif ($montantFilter === 'desc') {
                $query->orderBy('Montant', 'desc');
            }
        }
    
        $factures = $query->get();  // Fetch filtered records
    
        return view('facture.index', compact('factures'));

    }

    public function create()
    {
        return view('facture.create');
    }

    public function store(Request $request)
{
    // Define validation rules for the form fields
    $rules = [
        'client' => 'required|string',
        'caissier' => 'required|string',
        'Montant' => 'required|numeric',
        'date' => 'required|date|after_or_equal:' . now()->toDateString(),
        'Etat' => 'required|in:Pending,Paid', // Assuming Etat should be one of these two values
    ];

      // Define custom validation messages
      $messages = [
        'client.required' => 'The client field is required.',
        'caissier.required' => 'The caissier field is required.',
        'Montant.required' => 'The Montant field is required.',
        'Montant.numeric' => 'The Montant field must be a number.',
        'date.required' => 'The date field is required.',
        'date.date' => 'The date field must be a valid date format.',
        'date.after_or_equal' => 'The date must be today or a future date.',
        'Etat.required' => 'The Etat field is required.',
        'Etat.in' => 'The Etat field must be either Pending or Paid.',
    ];
    // Validate the form data
    $this->validate($request, $rules, $messages);

    // If validation passes, you can proceed to save the data
    $input = $request->all();
    Facture::create($input);

    return redirect('facture')->with('flash_message', 'Facture created successfully');
}

    public function show($id)
    {
        $facture = Facture::find($id);
        return view('facture.show', compact('facture'));
    }

    public function edit($id)
    {
        $facture = Facture::find($id);
        return view('facture.edit', compact('facture'));
    }

    public function update(Request $request, $id)
    {
        // Define validation rules for the form fields, similar to the 'store' method
        $rules = [
            'client' => 'required|string',
            'caissier' => 'required|string',
            'Montant' => 'required|numeric',
            'date' => 'required|date|after_or_equal:' . now()->toDateString(),
            'Etat' => 'required|in:Pending,Paid',
        ];
    
        // Define custom validation messages
        $messages = [
            'client.required' => 'The client field is required.',
            'caissier.required' => 'The caissier field is required.',
            'Montant.required' => 'The Montant field is required.',
            'Montant.numeric' => 'The Montant field must be a number.',
            'date.required' => 'The date field is required.',
            'date.date' => 'The date field must be a valid date format.',
            'date.after_or_equal' => 'The date must be today or a future date.',
            'Etat.required' => 'The Etat field is required.',
            'Etat.in' => 'The Etat field must be either Pending or Paid.',
        ];
    
        // Validate the form data
        $this->validate($request, $rules, $messages);
    
        $facture = Facture::find($id);
        $input = $request->all();
        $facture->update($input);
    
        return redirect('facture')->with('flash_message', 'Facture updated successfully');
    }

    public function destroy($id)
    {
        Facture::destroy($id);
        return redirect('facture')->with('flash_message', 'Facture deleted successfully');
    }
}
