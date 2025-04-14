<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Buat view ini
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login sebagai Admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard'); // Buat route ini
        }

        // Coba login sebagai Anggota
        if (Auth::guard('anggota')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('welcome'); // Buat route ini
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput(); // Mempertahankan nilai input
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('anggota')->check()) {
            Auth::guard('anggota')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Buat view ini
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:anggotas', // Validasi untuk tabel anggotas
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); // Mempertahankan nilai input
        }

        Anggota::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('welcome')->with('success', 'Registrasi berhasil! Silakan login.'); // Arahkan ke halaman login
    }
}
