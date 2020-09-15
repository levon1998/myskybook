<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDonateController extends Controller
{
    public function index()
    {
        return view('backend.donate.index');
    }
}
