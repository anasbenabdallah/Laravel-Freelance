<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLocationRequest;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Location;
use App\Claim;
use App\ClaimComment;


use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Claim::all();
        $comments = ClaimComment::all(); // Récupérez tous les commentaires
        $claims = Claim::all(); // Récupérez toutes les réclamations


        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        abort_if(Gate::denies('location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'claim_id' => 'required|exists:claims,id',
            'comment_text' => 'required',
            'comment_role' => 'required',
        ]);
    
        // Create a new ClaimComment instance
        $comment = new ClaimComment([
            'claim_id' => $request->input('claim_id'),
            'comment_text' => $request->input('comment_text'),
            'comment_role' => $request->input('comment_role'),
        ]);
    
        // Save the comment to the database
        $comment->save();
    
        // Redirect to the comments show page for the corresponding location
        return redirect()->route('admin.locations.show', $request->input('claim_id'));
    }
    
    public function edit(Claim $location)
    {
        abort_if(Gate::denies('location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.locations.edit', compact('location'));
    }

    public function update(UpdateLocationRequest $request, Claim $location)
    {
        $location->update($request->all());

        return redirect()->route('admin.locations.index');
    }

    public function show(Claim $location)
    {
        abort_if(Gate::denies('location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $comments = ClaimComment::where('claim_id', $location->id)->get();
    
        return view('admin.locations.show', compact('location', 'comments'));
    }
    

    public function destroy(Claim $location)
    {
        abort_if(Gate::denies('location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->delete();

        return back();
    }

    public function massDestroy(MassDestroyLocationRequest $request)
    {
        Claim::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
