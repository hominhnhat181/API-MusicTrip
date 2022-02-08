<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagService;
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index(Request $request)
    {   
        $tags = $this->tagService->getData($request, 8);
        return view('backend.tags.index', compact('tags'));
    }

   
    public function create()
    {
        return view('backend.tags.create');
    }

    
    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->tagService->store($attributes);
        flash("Add Tag Success")->success();
        return redirect()->route('admin.tag.index');

    }

    public function changeStatus($id)
    {
        $this->tagService->changeStatus($id);
        return redirect()->Route('admin.tag.index');
    }

    
    public function show()
    {
     
    }
    
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('backend.tags.edit', compact('tag'));   
    }

    
    public function update(Request $request, $id)
    {
        $attributes = $request->except('_token', '_method');
        $this->tagService->update($id, $attributes);
        flash("Update Tag Success")->success();
        return redirect()->route('admin.tag.index');
    }

   
    public function destroy($id)
    {
        $this->tagService->destroy($id);
        flash("Delete Tag Success")->success();
        return redirect()->route('admin.tag.index');
    }
}
