<?php

namespace App\Http\Controllers\Admin;

use App\Models\AlbumImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumImagesController extends Controller
{
    public function destroy(AlbumImages $image){
        if(file_exists(storage_path('app/public/' . $image->image_path))){
            unlink(storage_path('app/public/' . $image->image_path));
        }
        $image->delete();

        return back()->with('success', 'Image Removed Successfully');
    }
}
