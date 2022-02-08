<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Song;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function goPlaylist($id)
    {
        $data = Song::where('album_id', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.playlist.playlist', compact('data'));
    }

    public function getAudio(Song $song)
    {
        // way 1 custom url 
        // $path = storage_path("app/public/{$Song->song}");
        // way 2 origin url (app/public)
        $path = Storage::url($song->song);

        if (!File::exists($path)) abort(404);
        $file = File::get($path);
        $type = File::mimeType($file);

        $response = Response::make($path, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
