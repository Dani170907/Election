<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    // menampilkan halaman
    public function index()
    {
        $candidates = Candidate::all();
        $userVote = Vote::where('user_id', Auth::id())->first();

        return view('voter.index', compact('candidates', 'userVote'));
    }

    // mengirimkan data voter
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

    // menampilkan dan mengirimkan data hasil voting
    public function results()
    {
        // ambil semua data dari candidates
        $candidates = Candidate::all();
        // ambil data vote yang dilakukan user
        $results = Candidate::withCount('votes')->orderBy('votes_count', 'desc')->get();
        return view('voter.results', compact('candidates', 'results'));
    }

    // public function reset() 
    // {
    //     $id->delete();

    //     return redirect()->route('candidate.index')
    //     ->with('success', 'Data Vote berhasil di Reset');
    // }
}
