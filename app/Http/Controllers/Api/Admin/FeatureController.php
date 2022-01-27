<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Services\FeatureService;
use Illuminate\Http\Request;


class FeatureController extends Controller
{
    private $featureService;
    public function __construct(FeatureService $featureService)
    {
        $this->featureService = $featureService;
    }


    public function index()
    {   
        return Feature::all();
    }

    
    public function create()
    {
        return view('backend.features.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' =>'required'
        ]);
        $data =[
            'name' => $request->name,
            'status' => $request->status
        ];
        $feature = $this->featureService->store($data);
        if(!empty($feature)){
            return response()->json('Create Feature Success', 200);   
        }
    }

    
    public function show($id)
    {
        return Feature::find($id);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' =>'required'
        ]);

        $feature = Feature::findOrFail($id);

        if($feature){
            $feature->name = $request->name;
            $feature->status = $request->status;
            $feature->save();
        }
        return response()->json('Update Feature Success', 200);   
    }

    
    public function destroy($id)
    {
        $feature = Feature::find($id);
        if($feature){
            $feature->delete();
        }
        return response()->json('Delete Feature Success', 200);   
    }
    

    public function changeStatus($id)
    {
        $this->featureService->changeStatus($id);
        return response()->json('Change Status Feature Success', 200);   
    }

}
