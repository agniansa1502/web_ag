<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses login
  public function login(Request $request)
{
    $request->validate([
        'login' => ['required'],
        'password' => ['required'],
    ]);

    $login = $request->login;

    // Login menggunakan email
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {

        $credentials = [
            'email' => $login,
            'password' => $request->password,
        ];

    } else {

        // Login menggunakan nama
        $credentials = [
            'name' => $login,
            'password' => $request->password,
        ];
    }

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    return back()
        ->withErrors([
            'login' => 'Username/email atau password salah.',
        ])
        ->withInput();
}
    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session login
        $request->session()->invalidate();

        // Buat token CSRF baru
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
