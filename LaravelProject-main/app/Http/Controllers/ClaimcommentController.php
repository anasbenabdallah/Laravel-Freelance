<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClaimComment;
use App\Claim;

class ClaimcommentController extends Controller
{
    public function index()
    {
        $comments = ClaimComment::with('claim')->get();
        $claims = Claim::all();

        return view('claimcomment.index', compact('comments', 'claims'));
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

        return redirect()->route('claimcomment.index');
    }
}