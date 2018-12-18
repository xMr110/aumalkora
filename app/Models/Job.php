<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use Translatable;
    protected $fillable =['code','open_date','end_date'];
    public $translatedAttributes = ['title','name','description'];


    public function jobrqts()
    {
        return $this->hasMany(Job::class);

    }
}
