<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['image_path'];
    public $traslatedAttributes = ['title'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
