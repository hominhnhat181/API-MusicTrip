<?php

namespace App\Http\Controllers\Backend;

use App\Enums\AlbumStatus;
use App\Enums\ArtistStatus;
use App\Enums\TagStatus;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Tag;
use App\Models\Upload;
use App\Services\SongService;
use Illuminate\Http\Request;

class SongController extends Controller
{
    private $songService;
    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    public function index(Request $request)
    {   
        $songs = $this->songService->getData($request, 8);
        return view('backend.songs.index', compact('songs'));
    }

   
    public function create()
    {
        $albums = Album::where('status', AlbumStatus::ACTIVE)->get();
        $artists = Artist::where('status', ArtistStatus::ACTIVE)->get();
        $tags = Tag::where('status', TagStatus::ACTIVE)->get();
        return view('backend.songs.create', compact('albums','artists','tags'));
    }

    
    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes['image'] = $this->songService->requestImg($request->image);
        $this->songService->store($attributes);
        flash("Add Song Success")->success();
        return redirect()->route('admin.song.index');

    }

    public function changeStatus($id)
    {
        $this->songService->changeStatus($id);
        return redirect()->Route('admin.song.index');
    }

    
    public function show()
    {
     
    }
    
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $albums = Album::where('status', AlbumStatus::ACTIVE)->get();
        $artists = Artist::where('status', ArtistStatus::ACTIVE)->get();
        $tags = Tag::where('status', TagStatus::ACTIVE)->get();
        $file = Upload::where('file_name',$song->image)->first();
        return view('backend.songs.edit', compact('song','file','albums','artists','tags'));   
    }

    
    public function update(Request $request, $id)
    {
        $attributes = $request->except('_token', '_method');
        $attributes['image'] = $this->songService->requestImg($request->image);
        $attributes['song'] = $this->songService->requestImg($request->song);
        $this->songService->update($id, $attributes);
        flash("Update Song Success")->success();
        return redirect()->route('admin.song.index');
    }

   
    public function destroy($id)
    {
        $this->songService->destroy($id);
        flash("Delete Song Success")->success();
        return redirect()->route('admin.song.index');
    }
}
