<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_Tag extends Model
{
    use HasFactory;
    protected $table ='album_tag';
    protected $fillable =[
        'album_id','tag_id'
    ] ;

    public $timestamps = false;
}
