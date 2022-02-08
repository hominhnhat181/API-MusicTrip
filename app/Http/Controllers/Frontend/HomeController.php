<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Feature;
use App\Models\Tag;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware(['admin']);
    //     Middleware('admin');
    // }

    // public function index(){
    //     $feature = Feature::where('status', 1)->limit(5)->get();
    //    return view('frontend.home.index', compact('feature'));
    // }
   public function test(){
       return view('frontend.home.index');
    }

}
