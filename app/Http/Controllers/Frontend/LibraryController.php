<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Album_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
    }

     // Library Show
    public function library($user_id){
        $user = User::where('id',$user_id)->get();
        return view('frontend.home.library', compact('user'));
    }

     // Library Add
     public function addLibrary(Request $request){
        $data = Album::find($request->album_id);
        $data->users()->sync(Auth::user()->id);
        return $data;
    }

     // Library Del
    public function destroy($id){
        Album_User::where('album_id', $id)->delete();
        return response()->json('Success', 200);
    }

    public function library2(){
        $user = User::find(Auth::user()->id);
        return response()->json($user, 200);
    }
}
