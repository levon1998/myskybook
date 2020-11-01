<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->orderBy('id', 'desc')->get();

        return view('frontend.home.index', compact('books'));
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
