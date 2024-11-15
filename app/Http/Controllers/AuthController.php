<?php

namespace App\Http\Controllers;
  
use Hash;
use Session;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
            'email' => 'required',
            'password' => 'required',
        ]);

        $access = $request->only('email', 'password');
        if(Auth::attempt($access)) {
            return redirect()->intended('candidate')
            ->withSuccess('Berhasil Login');
        }

        return redirect('login')->withError('Kamu tidak memilliki Akses Masuk');
    }

    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);


        return redirect('candidate')->withSuccess('Berhasil Login');

        // dd($request);
    }


    public function dashboard()
    {
        if(Auth::check()) {
            return view('candidate.index');
        }

        return redirect('login')->withSuccess('Kamu tidak memiliki akses');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login')->with('message', 'success logout');
    }
}
