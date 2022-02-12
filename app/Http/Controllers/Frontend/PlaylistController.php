<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function goPlaylist($id)
    {
        $songs = Song::where('album_id', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        $totalSongs = count($songs);
        $songIds = Song::all()->modelKeys();
        $album = Album::find($id);
        return view('frontend.playlist.playlist', compact('songs', 'songIds','album', 'totalSongs'));
    }


}
