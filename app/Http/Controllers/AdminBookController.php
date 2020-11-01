<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use App\Services\GenerateSlug;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::orderByDesc('id')->get();

        return view('backend.book.index', compact('books'));
    }

    public function create()
    {
        $mode = 'store';
        $authors = Author::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('backend.book.edit', compact(
            'mode',
            'authors',
            'tags',
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|max:255',
            'short_name'        => 'required|max:255',
            'description'       => 'required|max:5000',
            'short_description' => 'required|max:255',
            'author_id'         => 'required',
            'book_file'         => 'nullable',
            'tags'              => 'required',
            'categories'        => 'required'
        ]);

        if ($request->file('book_file')) {
            $validatedData['filename'] = str_replace('public/books', '', $request->file('book_file')->store('public/books'));
        }

        $slugService = new GenerateSlug(new Book);
        $validatedData['slug'] = $slugService->generate($request->input('name'));

        if ((int) $validatedData['author_id'] === 0) {
            $validatedData['author_id'] = Author::create(['name' => $validatedData['author_id']])->id;
        }
        $book = Book::create($validatedData);

        $book->tags()->sync($validatedData['tags']);
        $book->categories()->sync($validatedData['categories']);

        return redirect()->to('/v1-admin/books')->with('success', '1');
    }

    public function edit($id)
    {
        $mode = 'update';
        $book = Book::find($id);
        $selectedTags = $book->tags->pluck('id')->all();
        $selectedCategories = $book->categories->pluck('id')->all();
        $authors = Author::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('backend.book.edit', compact(
            'mode',
            'book',
            'selectedTags',
            'selectedCategories',
            'authors',
            'tags',
            'categories'
        ));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id'                => 'required|exists:books',
            'name'              => 'required|max:255',
            'short_name'        => 'required|max:255',
            'description'       => 'required|max:5000',
            'short_description' => 'required|max:255',
            'author_id'         => 'required',
            'book_file'         => 'nullable',
            'tags'              => 'required',
            'categories'        => 'required',
            'chapters'          => 'nullable|array'
        ]);

        $slugService = new GenerateSlug(new Book, $validatedData['id']);
        $validatedData['slug'] = $slugService->generate($request->input('name'));

        if ((int) $validatedData['author_id'] === 0) {
            $validatedData['author_id'] = Author::create(['name' => $validatedData['author_id']])->id;
        }

        $update = [
            'name' => $validatedData['name'],
            'short_name' => $validatedData['short_name'],
            'description' => $validatedData['description'],
            'short_description' => $validatedData['short_description'],
            'author_id' => $validatedData['author_id']
        ];

        if ($request->file('book_file')) {
            $update['filename'] = str_replace('public/books', '', $request->file('book_file')->store('public/books'));
        }

        Book::where('id', $validatedData['id'])->update($update);

        $book = Book::find($validatedData['id']);

//        foreach ($validatedData['chapters'] as $chapter) {
//            $book->chapters()->create(['body' => $chapter]);
//        }

        $book->tags()->sync($validatedData['tags']);
        $book->categories()->sync($validatedData['categories']);

        return redirect()->to('/v1-admin/books')->with('success', '1');
    }

    public function delete($id)
    {
        if (!Book::where('id', $id)->exists()) {
            return redirect()->to('/v1-admin/books')->with('success', '2');
        }
        Book::where('id', $id)->delete();

        return redirect()->to('/v1-admin/books')->with('success', '1');

    }
}
