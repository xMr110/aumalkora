<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    //
    public function index()
    {
        $slides=Slider::all();
        return view('admin.sliders.index',compact('slides'));
    }
    public function create()
    {
        return view('admin.sliders.create-edit');
    }
    public function edit($id)
    {
        $slide = Slider::findOrFail($id);
        return view('admin.sliders.create-edit',compact('slide'));
    }
    public function store(SliderRequest $request)
    {
        $this->validate($request,['image_path'=>'required|image']);
        $slide = new Slider();
        if ($request->hasFile('image_path'))
        {
            $slide->image_path=$request->file('image_path')->store('slider','public');
        }
        $slide->active = $request->has('active') ? 1 : 0;
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key)) {
                $slide->translateOrNew($key)->title = $request->get('title_' . $key);
            }
            if ($request->get('description_' . $key)) {
                $slide->translateOrNew($key)->description = $request->get('description_' . $key);
            }
        }
        $slide->save();
        return redirect(action('Admin\SliderController@index'))->with('Success','Slide Added Successfully');

    }
    public function update(SliderRequest $request,$id)
    {
        $slide = Slider::findOrFail($id);
        if ($request->hasFile('image_path'))
        {
            if(file_exists(storage_path('/storage/'.$slide->image_path)))
            {
                unlink(storage_path('/storage/'.$slide->image_path));
            }
            $slide->image_path=$request->file('image_path')->store('slider','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key)) {
                $slide->translateOrNew($key)->title = $request->get('title_' . $key);
            }
            if ($request->get('description_' . $key)) {
                $slide->translateOrNew($key)->description = $request->get('description_' . $key);
            }
        }
        $slide->save();
        return redirect(action('Admin\SliderController@index'))->with('Success','Slide Updated Successfully');

    }

    public function destroy($id)
    {
        $slide=Slider::findOrFail($id);
        if(file_exists('/storage/'.$slide->image_path))
        {
            unlink(storage_path('/storage/'.$slide->image_path));

        }
        $slide->delete();
        return redirect(action('Admin\SliderController@index'))->with('Success','Slide Removed Successfully');

    }





    public function active(Slider $slide)
    {
        return $this->set_editable($slide, 'active');
    }

}
