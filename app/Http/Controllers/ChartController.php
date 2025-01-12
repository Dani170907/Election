<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public.results');
    }

    public function detailsCandidates()
    {
        $candidates = Candidate::all();
        return view('public.detailsCandidates', compact('candidates'));
    }
    // public function candidate($id)
    // {
    //     return view('public.candidate', compact('id'));
    // }
}
