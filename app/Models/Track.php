<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $table ='tracks';
    protected $fillable =[
        'name','image','song','album_id','artist_id','tag_id','status'
    ] ;

    public function albums(){
        return $this->belongsTo(Album::class,'album_id');
    }

    public function artists(){
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function tags(){
        return $this->belongsTo(Tag::class,'tag_id');
    }

    
}
