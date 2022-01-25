<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist_Album extends Model
{
    use HasFactory;
    protected $table ='artist_album';
    protected $fillable =[
        'artist_id','album_id'
    ] ;

    public $timestamps = false;
}
