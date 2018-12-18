<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumImages extends Model
{
    //
    protected $fillable = [
        'image_path', 'visible'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

}
