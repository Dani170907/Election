<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        $userVote = Vote::where('user_id', Auth::id())->first();

        return view('voter.index', compact('candidates', 'userVote'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $hasVote = Vote::where('user_id', Auth::id())->first();
        if ($hasVote) {
            return redirect()->back()->with('error', 'Anda sudah melakukan vote!');
        }

        Vote::create([
            'user_id' => Auth::id(),
            'candidate_id' => $request->candidate_id,
        ]);

        return redirect()->route('voter.index')->with('success', 'Vote berhasil disimpan!');
    }
}
