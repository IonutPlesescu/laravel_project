<?php

// app/Http/Controllers/AdminUserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin_users.index', compact('users'));
    }

    public function toggleRole(Request $request, User $user)
    {
        $user->role = $user->role === 'admin' ? 'utilizator' : 'admin';
        $user->save();

        return redirect()->route('admin_users.index')->with('success', 'Rolul utilizatorului a fost actualizat cu succes.');
    }
}

