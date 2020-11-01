<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', User::USER)->orderBy('id', 'desc')->get();

        return view('backend.user.index', compact('users'));
    }
}
