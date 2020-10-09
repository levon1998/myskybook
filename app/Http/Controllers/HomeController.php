<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function subscribe(Request $request)
    {
        $validatedData = $request->validate([
            'subscribeEmail' => 'required|unique:subscribers,email'
        ]);

        Subscriber::create(['email' => $validatedData['subscribeEmail']]);

        return response()->json('ok');
    }
}
