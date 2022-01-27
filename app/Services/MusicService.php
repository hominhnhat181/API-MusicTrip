<?php

namespace App\Services;

use App\Models\Album;

class MusicService
{
    public function getAlbums($params)
    {
        $data = new Album;
        if (!empty($params['where'])) {
            $data = $data->where($params['where']);
        }
        if (!empty($params['limit'])) {
            $data = $data->limit($params['limit']);
        }
        if (!empty($params['order_by'])) {
            $data = $data->orderBy($params['order_by'], $params['sort']);
        }
        if (!empty($params['with'])) {
            $data = $data->with($params['with']);
        }
        if (!empty($params['paginate'])) {
            return $data->paginate($params['paginate']);
        }
        return $data->get();
    }


    public function findMusic($id){
        return Album::findOrFail($id);
    }


    // public function getComment($params){
    //     $data = new Comment;
    //     if(!empty($params['where'])){
    //         $data = $data->where($params['where']);
    //     }
    //     if(!empty($params['limit'])){
    //         $data = $data->limit($params['limit']);
    //     }
    //     if(!empty($params['order_by'])){
    //         $data = $data->orderBy($params['order_by'],$params['sort']);
    //     }
    //     if(!empty($params['with'])){
    //         $data = $data->with($params['with']);
    //     }
    //     if(!empty($params['paginate'])){
    //         return $data->paginate($params['paginate']);
    //     }
    //     return $data->get();
    // }

    // public function uploadFile($id,$files,$type, $comment_id = null){
    //     $type_file = array(
    //         "jpg"=>"image",
    //         "jpeg"=>"image",
    //         "png"=>"image",
    //         "svg"=>"image",
    //         "webp"=>"image",
    //         "gif"=>"image",
    //         "mp4"=>"video",
    //         "mpg"=>"video",
    //         "mpeg"=>"video",
    //         "webm"=>"video",
    //         "ogg"=>"video",
    //         "avi"=>"video",
    //         "mov"=>"video",
    //         "flv"=>"video",
    //         "swf"=>"video",
    //         "mkv"=>"video",
    //         "wmv"=>"video"
    //     );
    //     foreach($files as $file){
    //         $upload = new ShopFile;
    //         $upload->file_original_name = null;
    //         $upload->file_original_name = $file->getClientOriginalName();
    //         $upload->fake_shop_id = $id;
    //         $extension = strtolower($file->getClientOriginalExtension());
    //         $upload->extension = $extension;
    //         if($type == 'comment'){
    //             if(isset($type_file[$extension])){
    //                 $upload->type = $type_file[$extension];
    //             }else{
    //                 $upload->type = "others";
    //             }
    //         }else{
    //             $upload->type = FileType::OWNER;
    //         }
    //         $upload->file_name = $file->store('uploads/fakeshop/'.$id);
    //         $upload->file_size = $file->getSize();
    //         if($comment_id){
    //             $upload->comment_id = $comment_id;
    //             $upload->is_comment = $comment_id ? 1 : 0;
    //         }
    //         $upload->save();
    //     }
    //     return true;
    // }

    // public function addComment($id, $data, $type){
    //     $cmt = new Comment;
    //     $cmt->fake_shop_id = $id;
    //     $cmt->user_id = \Auth::user()->id;
    //     $cmt->content = $data['content'];
    //     $cmt->status = FakeShopStatus::ACTIVE;
    //     $cmt->type = $type;
    //     $cmt->save();
    //     return $cmt;
    // }

    // /**
    //  * Create comment from data
    //  * 
    //  * @param array $data
    //  * 
    //  * @return App\Models\Comment
    //  */
    // public function createComment($data){
    //     return Comment::create($data);
    // }

}   
