<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $request->validate([
            'identity' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah user ada di database berdasarkan identity
        $user = User::where('identity', $request->identity)->first();

        // Jika user ditemukan dan password cocok
        if ($user && Auth::attempt(['identity' => $request->identity, 'password' => $request->password])) {
            // Redirect berdasarkan role
            return match ($user->role) {
                'mahasiswa' => redirect()->route('dashboard.mahasiswa'),
                'dosen' => redirect()->route('dashboard.dosen'),
                'admin' => redirect()->route('dashboard.admin'),
                default => redirect()->route('home'),
            };
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'identity' => 'Login gagal! Periksa kembali NPM/NIDN/Username dan password Anda.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
