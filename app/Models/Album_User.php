<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_User extends Model
{
    use HasFactory;
    protected $table ='album_user';
    protected $fillable =[
        'album_id','user_id'
    ] ;

    public $timestamps = false;
}