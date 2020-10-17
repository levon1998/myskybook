<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Tag;
use App\Models\UserLikeBook;
use App\Models\UserWatchLaterBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::orderBy('name')->with('books')->get();
        $books = Book::select('id', 'slug', 'short_name', 'short_description', 'filename', 'author_id')
            ->when(!empty($request->input('sort')), function ($q) use ($request) {
                if ($request->input('sort') == 'a-z') {
                    $q->orderBy('short_name');
                } elseif ($request->input('sort') == 'z-a') {
                    $q->orderBy('short_name', 'desc');
                } elseif ($request->input('sort') == 'high') {
                    $q->orderBy('name', 'asc');
                } elseif ($request->input('sort') == 'low') {
                    $q->orderBy('name', 'desc');
                }
            })
            ->with(['author', 'categories', 'like', 'watchLater'])->paginate(10);

        return view('frontend.book.index', compact('tags', 'books'));
    }

    public function addToFavorite(Request $request)
    {
        $validatedData = $request->validate([
            'bookId' => 'required|exists:books,id'
        ]);

        if (!Auth::check()) {
            return response()->json('Please sign in or create new account', 500);
        }

        UserLikeBook::create([
            'user_id' => Auth::id(),
            'book_id' => $validatedData['bookId']
        ]);

        return response()->json('ok');
    }

    public function addToWatchLater(Request $request)
    {
        $validatedData = $request->validate([
            'bookId' => 'required|exists:books,id'
        ]);

        if (!Auth::check()) {
            return response()->json('Please sign in or create new account', 500);
        }

        UserWatchLaterBook::create([
            'user_id' => Auth::id(),
            'book_id' => $validatedData['bookId']
        ]);

        return response()->json('ok');
    }
}
