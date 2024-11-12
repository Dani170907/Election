<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(){
        $candidate = Candidate::all();
        return view('candidate', compact('candidate'));
    }
}
