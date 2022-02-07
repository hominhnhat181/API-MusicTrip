<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    protected $table = "uploads";
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'file_original_name', 'file_name', 'extension', 'type', 'file_size',
    ];
}
