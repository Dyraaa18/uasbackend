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
            'terms' => 'accepted', // terms acceptance validation
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // unique validation for email
            'password' => 'required|string|min:8|confirmed', // confirmed validation for password and password_confirmation
            
        ], [
            'email.unique' => 'Email sudah terdaftar. Gunakan email lain.',
            'password.min' => 'Password anda kurang panjang.',
            'password.confirmed' => 'password tidak cocok.',
            'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan untuk melanjutkan.',
        ]);

        if (!$request->filled('terms')) {
            $validator->errors()->add('terms', 'Anda harus menyetujui syarat dan ketentuan untuk melanjutkan.');
        }


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
        
        if ($user) {
            if (Auth::guard('web')->attempt($credentials)) {
                // Jika login sebagai user berhasil
                $request->session()->regenerate();
                return redirect()->intended('/');
            } else {
                // Jika password salah
                return back()->withErrors([
                    'password' => 'Password salah',
                ])->withInput();
            }
        } else {
            // Jika email tidak terdaftar
            return back()->withErrors([
                'email' => 'Email tidak terdaftar',
            ])->withInput();
        }
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
