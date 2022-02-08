<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Feature;
use App\Models\Upload;
use App\Services\AlbumService;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    private $albumService;
    public function __construct(AlbumService $albumService)
    {
        $this->albumService = $albumService;
    }

    public function index(Request $request)
    {   
        $albums = $this->albumService->getData($request, 8);
        return view('backend.albums.index', compact('albums'));
    }

   
    public function create()
    {
        $features = Feature::get();
        return view('backend.albums.create', compact('features'));
    }

    
    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes['image'] = $this->albumService->requestImg($request->image);
        $this->albumService->store($attributes);
        flash("Add Album Success")->success();
        return redirect()->route('admin.album.index');

    }

    public function changeStatus($id)
    {
        $this->albumService->changeStatus($id);
        return redirect()->Route('admin.album.index');
    }

    public function show()
    {
        //  
    }
    
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $features = Feature::get();
        $file = Upload::where('file_name',$album->image)->first();
        return view('backend.albums.edit', compact('album','features','file'));   
    }

    
    public function update(Request $request, $id)
    {
        $attributes = $request->except('_token', '_method');
        $attributes['image'] = $this->albumService->requestImg($request->image);
        $this->albumService->update($id, $attributes);
        flash("Update Album Success")->success();
        return redirect()->route('admin.album.index');
    }

   
    public function destroy($id)
    {
        $this->albumService->destroy($id);
        flash("Delete Album Success")->success();
        return redirect()->route('admin.album.index');
    }
}
