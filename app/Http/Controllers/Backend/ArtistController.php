<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Upload;
use App\Services\ArtistService;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    private $artistService;
    public function __construct(ArtistService $artistService)
    {
        $this->artistService = $artistService;
    }

    public function index(Request $request)
    {   
        $artists = $this->artistService->getData($request, 8);
        return view('backend.artists.index', compact('artists'));
    }

   
    public function create()
    {
        return view('backend.artists.create');
    }

    
    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes['image'] = $this->artistService->requestImg($request->image);
        $this->artistService->store($attributes);
        flash("Add Artist Success")->success();
        return redirect()->route('admin.artist.index');

    }

    public function changeStatus($id)
    {
        $this->artistService->changeStatus($id);
        return redirect()->Route('admin.artist.index');
    }

    public function show()
    {
        //  
    }
    
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        $file = Upload::where('file_name',$artist->image)->first();
        return view('backend.artists.edit', compact('file','artist'));   
    }

    
    public function update(Request $request, $id)
    {
        $attributes = $request->except('_token', '_method');
        $attributes['image'] = $this->artistService->requestImg($request->image);
        $this->artistService->update($id, $attributes);
        flash("Update Artist Success")->success();
        return redirect()->route('admin.artist.index');
    }

   
    public function destroy($id)
    {
        $this->artistService->destroy($id);
        flash("Delete Artist Success")->success();
        return redirect()->route('admin.artist.index');
    }
}
