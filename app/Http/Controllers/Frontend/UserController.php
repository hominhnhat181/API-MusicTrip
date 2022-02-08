<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    

    public function profile($id){
        $admins = User::where('id', $id)->get();
        return view('frontend.home.account',compact('admins'));
    }


   


}

