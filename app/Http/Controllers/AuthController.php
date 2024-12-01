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
        return view('auth.login', [
            'title' => 'Halaman Login',
        ]);
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

        // ambil data user berdasarkan nis
        $user = User::where('nis', $request->nis)->first();

        // cek keberadaan user
        if (!$user) {
            return redirect('login')->withError('NIS yang Anda masukkan salah');
        }

        // compare password yang di input dengan yang ada di database
        if (!Hash::check($request->password, $user->password)) {
            return redirect('login')->withError('Password yang Anda masukkan salah');
        }

        $access = $request->only('nis', 'password');
        if(Auth::attempt($access)) {
            if ($user->role === 'student') {
                return redirect()->intended('voter')
                ->withSuccess('Selamat Datang' . $user->name);
            } else if ($user->role === 'admin') {
                return redirect()->intended('admin')->withSuccess('Berhasil Login');
            }
        }

        return redirect('login')->withError('Kamu tidak memilliki Akses Masuk');
    }

    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required|unique:users',
            'password' => 'required|min:3|confirmed',
        ],
        [
            'nis.unique'=> 'NIS sudah terdaftar, silahkan login untuk masuk',
            'password.min'=> 'Password minimal 3 karakter',
            'password.confirmed'=> 'Konfirmasi password tidak cocok',
        ]);

        $data = $request->all();

        $user = $this->create($data);

        Auth::login($user);

        return redirect('voter')->withSuccess('Selamat Datang ' . $user->name);

        // dd($request->all());
    }


    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $results = Candidate::withCount('votes')->orderBy('votes_count', 'desc')->get();
            $totalVotes = $results->sum('votes_count');
            
            return view('admin.index', compact('results', 'totalVotes'));
        }

        return redirect('login')->withSuccess('Kamu tidak memiliki akses');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'nis' => $data['nis'],
            'password' => Hash::make($data['password']),
            'role' => 'student',
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
