<?php

namespace App\Http\Controllers;

use App\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function submitClaim(Request $request)
    {
        // Validate the form data
        $request->validate([
            'claim_mail' => 'required|email',
            'claim_title' => 'required|string|max:25',
            'claim_details' => 'required|string|max:100',
            'claim_rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new claim instance
        Claim::create([
            'claim_mail' => $request->input('claim_mail'),
            'claim_title' => $request->input('claim_title'),
            'claim_details' => $request->input('claim_details'),
            'claim_rating' => $request->input('claim_rating'),

        ]);

        // Redirect back with a success message or perform any other actions
        return redirect()->back()->with('success', 'Claim submitted successfully!');
    }
}