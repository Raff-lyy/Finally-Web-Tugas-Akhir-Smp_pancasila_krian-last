<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Ambil user dari email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan'
            ])->onlyInput('email');
        }

        // Cek password
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Password salah'
            ])->onlyInput('email');
        }

        // Login berhasil
        Auth::login($user);
        $request->session()->regenerate();

        // Update last login IP & waktu
        $user->last_login_ip = $request->ip() ?? '127.0.0.1'; // fallback untuk localhost
        $user->last_login_at = now();
        $user->save();

        // Optional: Log info untuk debug
        

        return redirect()->intended(route('dashboard'));
    }

    // Menampilkan dashboard
    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard.dashboard', compact('user'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
