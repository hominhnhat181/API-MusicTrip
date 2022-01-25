<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    
    public function showLogin()
    {
        return view('backend.auth.login');
    }

 
    public function loginHandle(Request $request){
        try{
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)){
                return response()->json([
                    'status_code' => 422,
                    'message' => 'Unauthorized',
                    
                ]);
            }

            $user =  User::where('email', $request->email)->first();

            if(!Hash::check($request->password, $user->password, [])){
                return response()->json([
                    'status_code' => 422,
                    'message' => 'Password Match',
                    
                ]);
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
            // return redirect()->route('admin.dashboard');

        }catch(Exception $error){
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in login',
                'error' => $error,
            ]);
        }
    }

    public function userdata(Request $request){
        return $request->user();
    }
 
    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json([
                'status_code' => 200,
                'message' => 'Logout successfull',
        ]);
    }
}
