<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    public function author($id)
    {
        $author = Author::find($id);
        $books = Book::where('author_id', $id)->orderBy('id', 'desc')->get();

        return view('frontend.author.single', compact('books', 'author'));
    }

    public function authors()
    {
        $authors = Author::all();

        return view('frontend.author.index', compact('authors'));
    }
}
