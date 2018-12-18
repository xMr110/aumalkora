<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\AlbumImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        $albums=Album::all();
        return view('admin.albums.index',compact('albums'));
    }
    public function create()
    {
        return view('admin.albums.create-edit');
    }
    public function edit(Album $album)
    {
        return view('admin.albums.create-edit',compact('album'));
    }
    public function store(AlbumRequest $request)
    {
        $this->validate($request,['image_path'=>'required|image']);
        $album = new Album();
        if ($request->hasFile('image_path'))
        {
            $album->image_path = $request->file('image_path')->store('albums','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $values)
        {
            if ($request->get('title_'. $key))
            {
                $album->translateOrNew($key)->title=$request->get('title_'.$key);
            }

        }
        if ($request->has('images'))
        {
            $images= array();
            foreach ($request->images as $item)
            {
                $image = new AlbumImages();
                $image->image_path = $item->store('Album' . $album->title, 'public' );
                array_push($images,$image);
            }
            $album->images()->saveMany($images);
        }
        $album->save();
        return redirect(action('Admin\AlbumController@index'))->with('success','Album Created Successfully');

    }
    public function update(AlbumRequest $request,Album $album)
    {
        if ($request->hasFile('image_path'))
        {
            if (file_exists(storage_path('/storage/'.$album->image_path)))
            {
                unlink(storage_path('/storage/'.$album->image_path));
            }
            $album->image_path=$request->file('image_path')->store('albums','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $values)
        {
            if ($request->get('title_'. $key))
            {
                $album->translateOrNew($key)->title=$request->get('title_'.$key);
            }

        }
        if($request->has('images')){
            $images = array();
            foreach ($request->images as $item){
                $image = new AlbumImages();
                $image->image_path = $item->store('albums/' . $album->title , 'public');
                array_push($images, $image);
            }

            $album->images()->saveMany($images);
        }

        $album->save();
        return redirect(action('Admin\AlbumController@index'))->with('success','Album Updated Successfully');
    }
    public function destroy(Album $album)
    {
        //TODO Fix relationship with Gallery
        if(file_exists('/storage/'.$album->image_path))
        {
            unlink(storage_path('/storage/'.$album->image_path));

        }
        $album->delete();
        return redirect(action('Admin\AlbumController@index'))->with('success','Album Removed Successfully');
    }
}
