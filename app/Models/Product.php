<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    protected $fillable = ['image_path','quantity','price','active','category_id'];
    public $traslatedAttributes = ['title','description'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
