<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table ='albums';
    protected $fillable =[
        'name','image','title','desc','feature_id','status'
    ] ;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'album_tag', 'album_id', 'tag_id');
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class,'artist_album', 'artist_id','album_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'album_user', 'album_id','user_id');
    }

    // add the foreign key in second parameter if want to get name of field relation
    public function features(){
        return $this->belongsTo(Feature::class,'feature_id');
    }

   
}
