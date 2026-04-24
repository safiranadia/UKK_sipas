<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;
use App\Mail\WelcomeAccountMail;

class AccountUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        
        $users = User::where('role', 'siswa')
            ->when($search, function ($query) use ($search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('username', 'LIKE', "%{$search}%")  
                      ->orWhere('email', 'LIKE', "%{$search}%")
                      ->orWhere('kelas', 'LIKE', "%{$search}%")
                      ->orWhere('nisn', 'LIKE', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view("admin.pages.account-siswa", compact('users', 'search'));
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
            $message = 'Akun siswa berhasil dibuat! Email konfirmasi telah dikirim ke '.$user->email;
        } catch (\Exception $e) {
            $message = 'Akun siswa berhasil dibuat! Email error: '.substr($e->getMessage(), 0, 60);
        }
        return redirect()->back()->with('success', $message);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'kelas' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:users,nisn,'.$id,
            'password' => 'nullable|string|min:6',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        
        return redirect()->back()->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}