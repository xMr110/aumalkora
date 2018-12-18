<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Translatable;
    protected $fillable = ['image_path','images'];
    public $translatedAttributes = ['title'];

    public function images()
    {
        return $this->hasMany(AlbumImages::class);

    }
}