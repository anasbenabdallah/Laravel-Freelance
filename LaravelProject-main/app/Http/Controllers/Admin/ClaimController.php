<?php
namespace App\Http\Controllers\Admin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateClaimRequest;
use App\Http\Requests\MassDestroyClaimRequest;
use App\Claim;
use App\ClaimComment;


class ClaimController extends Controller
{ 
    public function index()
    {
        $claims = Claim::all();
        $comments = ClaimComment::all();

        return view('admin.claims.index', compact('claims', 'comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'claim_id' => 'required|exists:claims,id',
            'comment_text' => 'required|max:30',
            'comment_role' => 'required',
        ]);
    
        $comment = new ClaimComment([
            'claim_id' => $request->input('claim_id'),
            'comment_text' => $request->input('comment_text'),
            'comment_role' => $request->input('comment_role'),
        ]);
    
        $comment->save();
    
        return redirect()->route('admin.claims.show', $request->input('claim_id'));
    }
    

    public function edit(Claim $claim)
    {
        return view('admin.claims.edit', compact('claim'));
    }
    
    public function update(UpdateClaimRequest $request, Claim $claim)
    {
        $claim->update($request->all());
        return redirect()->route('admin.claims.index');
    }
    
    public function show(Claim $claim)
    {

        $comments = ClaimComment::where('claim_id', $claim->id)->get();

        return view('admin.claims.show', compact('claim', 'comments'));
    }

    public function destroy(Claim $claim)
    {

        $claim->delete();

        return back();
    }

    public function massDestroy(MassDestroyClaimRequest $request)
    {
        Claim::whereIn('id', $request->input('ids'))->delete();
    
        return response(null, Response::HTTP_NO_CONTENT);
    }    
    
  
}