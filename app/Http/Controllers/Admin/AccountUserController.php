<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeAccountMail;

class AccountUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'siswa')->paginate(10);
        return view("admin.pages.account-siswa", compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'kelas' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'nisn' => 'required|string|max:20|unique:users,nisn',
        ]);

        $passwordPlain = $validated['password'];
        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'siswa';

        // dd($validated);

        $user = User::create($validated);

        try {
            Mail::to($user->email)->send(new WelcomeAccountMail([
                'nisn' => $user->nisn,
                'username' => $user->username,
                'email' => $user->email,
                'kelas' => $user->kelas,
                'password_plain' => $passwordPlain,
                'from_admin' => true,
            ]));
            $message = '✅ Akun siswa berhasil dibuat! Email konfirmasi telah dikirim ke '.$user->email;
        } catch (\Swift_TransportException $e) {
            $message = '✅ Akun siswa berhasil dibuat! (Gagal koneksi email: '.$e->getCode().')';
        } catch (\Exception $e) {
            $message = '✅ Akun siswa berhasil dibuat! Email error: '.substr($e->getMessage(), 0, 60);
        }
        
        return redirect()->back()->with('success', $message);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}