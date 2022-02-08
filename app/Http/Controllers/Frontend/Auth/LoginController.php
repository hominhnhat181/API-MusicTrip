<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Socialite;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('auth.login');
    }


    public function loginHandle(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            flash("Login Success!")->success();
            return redirect()->intended('/');
        }
        flash("Login details are not valid!")->error();
        return redirect("login");
    }


    public function logout(Request $request)
    {
        Session::flush(); 
        Auth::logout();
        flash("Logout Success!")->success();
        return Redirect('login');
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $this->_registerOrLoginUser($user,$provider);

        return redirect('/');
    }

    
    protected function _registerOrLoginUser($data,$provider)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $provider_id = $provider.'_id';
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->status = "1";
            $user->$provider_id = $data->id;
            $user->image = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
}
