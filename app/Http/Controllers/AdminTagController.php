<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\GenerateSlug;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderByDesc('id')->get();

        return view('backend.tag.index', compact('tags'));
    }

    public function create()
    {
        $mode = 'store';

        return view('backend.tag.edit', compact('mode'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:30'
        ]);

        $slugService = new GenerateSlug(new Tag, $validatedData['id']);
        $slug = $slugService->generate($request->input('name'));

        Tag::create([
            'name' => $validatedData['name'],
            'slug' => $slug
        ]);

        return redirect()->to('/v1-admin/tags')->with('success', '1');
    }

    public function edit($id)
    {
        $mode = 'update';
        $tag = Tag::find($id);

        return view('backend.tag.edit', compact('mode', 'tag'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id'    => 'required|exists:tags',
            'name'  => 'required|max:30'
        ]);

        $slugService = new GenerateSlug(new Tag);
        $slug = $slugService->generate($request->input('name'));

        Tag::where('id', $validatedData['id'])->update([
            'name' => $validatedData['name'],
            'slug' => $slug
        ]);

        return redirect()->to('/v1-admin/tags')->with('success', '1');
    }

    public function delete($id)
    {
        if (!Tag::where('id', $id)->exists()) {
            return redirect()->to('/v1-admin/tags')->with('success', '2');
        }
        Tag::where('id', $id)->delete();

        return redirect()->to('/v1-admin/tags')->with('success', '1');

    }
}
