<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Tentukan kolom berdasarkan role yang dipilih
        $column = match ($request->role) {
            'mahasiswa' => 'npm',
            'dosen' => 'nidn',
            'admin' => 'username',
        };
    
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'identity' => 'required|string|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ]);
        
    
        // Simpan user ke database
        User::create([
            'name' => $request->name,
            'identity' => $request->identity, 
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
    
}
