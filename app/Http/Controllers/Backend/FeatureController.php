<?php

namespace App\Http\Controllers\Backend;

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
        $features = Feature::paginate(10);
        return view('backend.features.index', compact('features'));
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
        $this->featureService->store($data);

        flash("Add Feature Success")->success();
        return redirect()->route('admin.feature.index');

    }

    public function changeStatus($id)
    {
        $this->featureService->changeStatus($id);
        return redirect()->Route('admin.feature.index');
    }

    
    public function show()
    {
     
    }

    
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('backend.features.edit', compact('feature'));   
    }

    
    public function update(Request $request, $id)
    {
        $feature = Feature::findOrFail($id);
        if($feature){
            $feature->name = $request->name;
            $feature->status = $request->status;
            $feature->save();
        }
        flash("Update Feature Success")->success();
        return redirect()->route('admin.feature.index');
    }

   
    public function destroy($id)
    {
        $feature = Feature::find($id);
        if($feature){
            $feature->delete();
        }
        flash("Delete Feature Success")->success();
        return redirect()->route('admin.feature.index');
    }
}
