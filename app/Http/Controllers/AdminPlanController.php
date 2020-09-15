<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPlanController extends Controller
{
    public function index()
    {
        return view('backend.plan.index');
    }
}
