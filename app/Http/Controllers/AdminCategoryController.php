<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\GenerateSlug;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();

        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        $mode = 'store';

        return view('backend.category.edit', compact('mode'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:30'
        ]);

        $slugService = new GenerateSlug(new Category);
        $slug = $slugService->generate($request->input('name'));

        Category::create([
            'name' => $validatedData['name'],
            'slug' => $slug
        ]);

        return redirect()->to('/v1-admin/categories')->with('success', '1');
    }

    public function edit($id)
    {
        $mode = 'update';
        $category = Category::find($id);

        return view('backend.category.edit', compact('mode', 'category'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id'    => 'required|exists:categories',
            'name'  => 'required|max:30'
        ]);

        $slugService = new GenerateSlug(new Category, $validatedData['id']);
        $slug = $slugService->generate($request->input('name'));

        Category::where('id', $validatedData['id'])->update([
            'name' => $validatedData['name'],
            'slug' => $slug
        ]);

        return redirect()->to('/v1-admin/categories')->with('success', '1');
    }

    public function delete($id)
    {
        if (!Category::where('id', $id)->exists()) {
            return redirect()->to('/v1-admin/categories')->with('success', '2');
        }
        Category::where('id', $id)->delete();

        return redirect()->to('/v1-admin/categories')->with('success', '1');

    }
}
