<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // amlbli data kandidat
    private function getCandidates()
    {
        // ambil semua data kandidat
        $candidates = Candidate::all();

        // ambil data votes dan hitung data
        $results = Candidate::withCount('votes')->orderBy('votes_count', 'desc')->get();

        // hitung total votes
        $totalVotes = $results->sum('votes_count');

        return compact('candidates', 'results', 'totalVotes');
    }

    public function index()
    {
        $data = $this->getCandidates();

        return view('public.results', $data);
    }

    public function candidate()
    {
        $data = $this->getCandidates();

        return view('public.candidate', $data);
    }
}


