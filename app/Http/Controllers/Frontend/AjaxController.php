<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Feature;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class AjaxController extends Controller
{   
    // Loadmore Home
    public function getArticles(Request $request)
    {
        $result = Feature::orderBy('id')->paginate(5);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($result as $ft) {
                $artilces .= '
                <div class="feature_music">
                    <div class="music_title">
                        <a href="">'.$ft->name.'</a>
                    </div>
                    <div class="row">';

                $counter = 1;
                foreach ($ft->albums as $album){
                    if($album->feature_id == $ft->id && $album->status == 1){
                        $artilces .= '
                        <div class="col-sm">
                            <div class="card card-stats">
                                <a class="link_album" href="'.Route("playlist",["id"=>''.$album->id.'']).'"><span></span></a>
                                <div class="card-header card-header-warning card-header-icon">
                                    <img src=" '.asset($album->image).'">
                                    <i data-toggle="modal" data-target="#exampleModal'.$album->id.'"  class="library material-icons">library_music</i>
                                    <div class="card_album">
                                        <div>
                                            <a href="" class="card-category"> '.$album->name.' </a>
                                        </div>';

                        foreach($album->tags as $role){
                            $artilces .= '<a href="" class="card-title">'.$role->name.'</a>';
                        }

                        $artilces .= '
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <p href="#">'.Str::limit($album->name, '34').'</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade save__ajax" id="exampleModal'.$album->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are You Want To Add This Album to Library?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="addRow(this)" data-url="'.Route('addLibrary').'" album-id="'.$album->id.'" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>';

                        $counter += 1;
                        if($counter > 5){
                            break;
                        }
                    }
                }
                
                $artilces .= ' 
                    </div>
                </div>';
            }
            return $artilces;
        }
        return view('frontend.home.index');
    }

    // LOCATION
    public function getDistrict(Request $request)
    {
        $html = '';
        if ($request->ajax()) {
            if($request->filled('province_id')){
                $districts = District::where('province_id', $request->province_id)->get();
                $html .= '<option value="">District</option>';
                foreach($districts as $item) {
                    $html.= '<option value="' . $item->id . '">' . $item->name . '</option>';
                }
            }else{
                $html .= '<option value="">'.__('home.district').'</option>';
            }
        }
        echo $html;
    }
    
    public function getWard(Request $request)
    {
        $html = '';
        if ($request->ajax()) {
            if($request->filled('district_id')){
                $wards = Ward::where('district_id', $request->district_id)->get();
                $html = '<option value="">Ward</option>';
                foreach($wards as $item) {
                    $html.= '<option value="' . $item->id . '">' . $item->name . '</option>';
                }
            }else{
                $html = '<option value="">'.__('home.ward').'</option>';
            }
        }
        echo $html;
    }
}
