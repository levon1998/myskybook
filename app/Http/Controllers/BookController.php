<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use App\Models\Tag;
use App\Models\UserLikeBook;
use App\Models\UserWatchLaterBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::orderBy('name')->with('books')->get();
        $books = $this->getBookQuery($request)
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

    public function book($slug)
    {
        $book = Book::where('slug', $slug)->with(['tags', 'categories', 'author'])->firstOrFail();
        $relatedBooks = Book::limit(5)->with('author')->get();
        $reviews = Review::where('book_id', $book->id)->get();
        $reviewAvg = (int)$reviews->avg('star');

        return view('frontend.book.single', compact('book', 'relatedBooks', 'reviews', 'reviewAvg'));
    }

    public function review(Request $request)
    {
        $validatedData = $request->validate([
            'bookId' => 'required|exists:books,id',
            'comment' => 'required|string|min:10',
            'name' => 'required|string',
            'email' => 'required|email',
            'website' => 'nullable|string',
            'star' => 'required|numeric'
        ]);

        Book::find($validatedData['bookId'])->reviews()->create($validatedData);

        return response()->json('ok');
    }

    public function byCategory($slug, Request $request)
    {
        $category = Category::select('id')->where('slug', $slug)->first();
        $tags = Tag::orderBy('name')->with('books')->get();
        $books = $this->getBookQuery($request)
            ->join('book_category', 'book_category.book_id', '=', 'books.id')
            ->where('book_category.category_id', $category->id)
            ->with(['author', 'categories', 'like', 'watchLater'])->paginate(10);

        return view('frontend.book.index', compact('tags', 'books'));
    }

    public function byTag($slug, Request $request)
    {
        $tag = Tag::select('id')->where('slug', $slug)->first();
        $tags = Tag::orderBy('name')->with('books')->get();
        $books = $this->getBookQuery($request)
            ->join('book_tag', 'book_tag.book_id', '=', 'books.id')
            ->where('book_tag.tag_id', $tag->id)
            ->with(['author', 'categories', 'like', 'watchLater'])
            ->paginate(10);

        return view('frontend.book.index', compact('tags', 'books'));
    }

    public function bookRead($slug)
    {
        $book = Book::where('slug', $slug)->with(['chapters'])->firstOrFail();

        $files = Storage::disk('s3')->allFiles("{$slug}/");

        return view('frontend.book.read', compact('book', 'files'));
    }

    private function getBookQuery($request)
    {
        return Book::select('books.id', 'slug', 'short_name', 'short_description', 'filename', 'author_id')
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
            ->when(!empty($request->input('search')), function ($q) use ($request) {
                $q->where('books.name', 'like', '%'.$request->input('search').'%');
            });
    }
}
