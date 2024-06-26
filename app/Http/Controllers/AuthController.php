<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan form register
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Fungsi untuk memproses registrasi
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Fungsi untuk memproses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();
        
        if ($user && Auth::guard('web')->attempt($credentials)) {
            // Jika login sebagai user berhasil
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        // Jika login gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }


    // Fungsi untuk logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
