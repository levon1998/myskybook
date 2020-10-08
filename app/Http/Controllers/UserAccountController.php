<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function likes()
    {
        return view('frontend.account.likes');
    }

}
