<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Tag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::orderBy('name')->with('books')->get();
        $books = Book::select('slug', 'short_name', 'short_description', 'filename', 'author_id')
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
            ->with(['author', 'categories'])->paginate(1);

        return view('frontend.book.index', compact('tags', 'books'));
    }
}
