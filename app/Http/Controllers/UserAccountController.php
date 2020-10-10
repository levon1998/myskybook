<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{

    public function index()
    {
        return view('frontend.account.index');
    }

    public function settings()
    {
        return view('frontend.account.settings');
    }

    public function watchLater()
    {
        return view('frontend.account.watchLater');
    }

    public function favorites()
    {
        return view('frontend.account.favorites');
    }

    public function accountSaveChanges(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required',
            'username'  => 'required|unique:users,username,'.Auth::id()
        ]);

        User::where('id', Auth::id())->update([
            'name'      => $validatedData['name'],
            'username'  => $validatedData['username']
        ]);

        return redirect('/settings')->with('successFullSaved', true);
    }

    public function accountSavePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password'  => ['required', 'string', 'min:6', 'confirmed']
        ]);

        User::where('id', Auth::id())->update([
            'password' => Hash::make($validatedData['password'])
        ]);

        return redirect('/settings')->with('successFullSaved', true);
    }
}
