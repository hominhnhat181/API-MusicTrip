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

    public function index(Request $request)
    {   
        $features = $this->featureService->getData($request, 8);
        return view('backend.features.index', compact('features'));
    }

   
    public function create()
    {
        return view('backend.features.create');
    }

    
    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->featureService->store($attributes);
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
        $attributes = $request->except('_token', '_method');
        $this->featureService->update($id, $attributes);
        flash("Update Feature Success")->success();
        return redirect()->route('admin.feature.index');
    }

   
    public function destroy($id)
    {
        $this->featureService->destroy($id);
        flash("Delete Feature Success")->success();
        return redirect()->route('admin.feature.index');
    }
}
