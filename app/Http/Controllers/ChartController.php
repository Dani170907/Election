<?php

namespace App\Http\Controllers;

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
    // public function candidate($id)
    // {
    //     return view('public.candidate', compact('id'));
    // }
}
