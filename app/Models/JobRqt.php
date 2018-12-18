<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobRqt extends Model
{
    protected  $fillable = ['pdf_file','date_of_apply'];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
