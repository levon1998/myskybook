<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLikeBook;
use App\Models\UserWatchLaterBook;
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
        $books = UserWatchLaterBook::where('user_id', Auth::id())->with('book')->get();

        return view('frontend.account.watchLater', compact('books'));
    }

    public function favorites()
    {
        $books = UserLikeBook::where('user_id', Auth::id())->with('book')->get();

        return view('frontend.account.favorites', compact('books'));
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
