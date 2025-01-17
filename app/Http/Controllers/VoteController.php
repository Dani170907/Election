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
        $results = Candidate::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->get();

        $totalVotes = $results->sum('votes_count');

        return view('voter.results', compact('candidates', 'results', 'totalVotes'), [
            'candidate' => $candidates,
            'title' => 'Hasil Voting Sementara',
        ]);
    }

    // mengirimkan data hasil voting ke API
    public function resultsApi()
    {
        // ambil semua data dari candidates dan hitung data votes
        $results = Candidate::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->get();

        $totalVotes = $results->sum('votes_count');

        $data = $results->map(function ($candidate) use ($totalVotes) {
            return [
                'id' => $candidate->id,
                'name' => $candidate->name,
                'votes_count' => $candidate->votes_count,
                'percentage' => ($candidate->votes_count > 0) ? ($candidate->votes_count / $totalVotes * 100) : 0,
                'image' => $candidate->photo,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Data voting berhasil didapatkan',
            'statusCode' => 200,
            'data' => $data,
            'total_votes' => $totalVotes,
        ]);
    }

    // menampilkan data results API ke public
    public function candidateApi($id)
    {
        $candidate = Candidate::withCount('votes')->find($id);

        if (!$candidate) {
            return response()->json([
                'success' => false,
                'message' => 'Candidate tidak ditemukan',
                'statusCode' => 404,
            ]);
        }

        $totalVotes = Candidate::withCount('votes')->get()->sum('votes_count');

        $persentage = ($candidate->votes_count > 0) ? ($candidate->votes_count / $totalVotes * 100) : 0;

        return response()->json([
            'success' => true,
            'message' => 'Data voting berhasil didapatkan',
            'statusCode' => 200,
            'data' => [
                'id' => $candidate->id,
                'name' => $candidate->name,
                'total_votes' => $candidate->votes_count,
                'image' => $candidate->photo,
                'persentage' => $persentage . '%',
            ],
        ]);
    }

}
