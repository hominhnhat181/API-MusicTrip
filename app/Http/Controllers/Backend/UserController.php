<?php

namespace App\Http\Controllers\Backend;

use App\Enums\CustomerAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Upload;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Enums\UserStatus;

class UserController extends Controller
{
    
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    

    public function index(Request $request)
    {   
       
        $users = $this->getData($request, 8);
      
        return view('backend.users.index', compact('users'));
    }

    
    public function getData($request, $is_paginate = 0)
    {
        $users = User::orderBy('id', 'desc');
        if ($request->search) {
            $search = $request->search;
            $users = $users->where(function ($alb) use ($search) {
                $alb->Where(DB::raw("CONCAT('#',id)"), 'like', "%$search%")
                    ->orwhere('name', 'like', "%$search%");
            });
        }
        if ($request->admin) {
            if ($request->admin != CustomerAdmin::ADMIN) {
                $users = $users->where('admin', CustomerAdmin::CUSTOMER);
            } else {
                $users = $users->where('admin', CustomerAdmin::ADMIN);
            }
        }
        if ($request->joined_date) {
            $users = $users->whereDate('created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $users = $users->paginate($is_paginate);
        } else {
            $users = $users->get();
        }
        return $users;
    }
    

    public function fillSearch(Request $request){
        $this->userService->fillDaSearch($request);
    }
    

    public function create()
    {
        return view('backend.users.create');
    }

   
    
    public function store(Request $request)
    {
        $dataUser = $request->all();

        $dataUser['image'] = $this->userService->requestImg($request->image);
        $dataUser['user_type'] = UserStatus::USER;
        $dataUser['password'] = Hash::make($request->password);
        $success = $this->userService->store($dataUser);

        if(!$success){
            flash("Create User Failed")->error();
            return redirect()->back();
        }
        flash("Create User Success")->success();
        return redirect()->Route('admin.user.index');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $user = $this->userService->find($id);
        $file = Upload::where('file_name',$user->avatar)->first();
        return view('backend.users.edit', compact('user','file'));
    }

    
    public function update(Request $request, $id)
    {
        $dataUser = $request->except('_token','_method','originImage','password_confirmation');
        $dataUser['image'] = $this->userService->requestImg($request->image);

        if(empty($request->password)){
            $userOld = User::find($id);
            $dataUser['password'] = $userOld->password;
        };
        $this->userService->update($id, $dataUser);
        Flash("Update User Success")->success();
        return redirect()->Route('admin.user.index');
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        Flash("Delete User Success")->success();
        return redirect()->back();
    }
}
