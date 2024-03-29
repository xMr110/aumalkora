<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumImages extends Model
{
    //
    protected $fillable = [
        'image_path'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

}
