<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table ='artists';
    protected $fillable = [
        'name',
        'image','status'
    ];

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'artist_album', 'artist_id', 'album_id');
    }
    

}
