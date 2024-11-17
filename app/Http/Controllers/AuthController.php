<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function registration(): View
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);

        $access = $request->only('nis', 'password');
        if(Auth::attempt($access)) {
            return redirect()->intended('voter')
            ->withSuccess('Berhasil Login');
        }

        return redirect('login')->withError('Kamu tidak memilliki Akses Masuk');
    }

    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        $data = $request->all();

        $user = $this->create($data);

        Auth::login($user);

        return redirect('candidate')->withSuccess('Berhasil Login');

        // dd($request->all());
    }


    public function dashboard()
    {
        if (Auth::check()) {
            // Ambil semua data kandidat dari database
            $candidates = Candidate::all();

            // Kirimkan data kandidat ke view
            return view('candidate.index', ['candidate' => $candidates]);
        }

        return redirect('login')->withSuccess('Kamu tidak memiliki akses');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'nis' => $data['nis'],
            'password' => Hash::make($data['password']),
        ]);

        // dd($data);
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login')->with('message', 'success logout');
    }
}
