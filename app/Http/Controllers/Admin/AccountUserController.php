<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountUserController extends Controller
{
    public function index(){
        $users = User::where('role', 'siswa')->paginate(10);
        return view("admin.pages.account-siswa", compact('users'));
    }
}
