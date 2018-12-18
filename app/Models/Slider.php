<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Translatable;
    protected $fillable=['active','image_path'];
    public $translatedAttributes = ['title','description'];
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
