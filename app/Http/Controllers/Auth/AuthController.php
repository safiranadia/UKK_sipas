<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeAccountMail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang Admin!');
            }

            return redirect()->route('siswa.home')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'kelas' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:users',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'kelas' => $validated['kelas'],
            'nisn' => $validated['nisn'],
            'role' => 'siswa', // Default role untuk registrasi mandiri
        ]);

        // Kirim email selamat datang
        try {
            Mail::to($user->email)->send(new WelcomeAccountMail([
                'username' => $user->username,
                'email' => $user->email,
                'kelas' => $user->kelas,
                'nisn' => $user->nisn,
                'from_admin' => false,
            ]));
            $message = '✅ Akun siswa berhasil dibuat! Email konfirmasi telah dikirim ke '.$user->email;
        } catch (\Exception $e) {
            $message = '✅ Akun siswa berhasil dibuat! (Gagal mengirim email)';
        }

        return redirect()->route('showLogin')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
