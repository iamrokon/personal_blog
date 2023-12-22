<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('tag.index',[
            'tags' => $tags
        ]);
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(StoreTagRequest $request){
        Tag::create($request->validated());
        return redirect()->back()->with(['success' => 'Tag created successfully!']);
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(StoreTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->back()->with(['success' => 'Tag updated successfully!']);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with(['success' => 'Tag deleted successfully!']);
    }
}
