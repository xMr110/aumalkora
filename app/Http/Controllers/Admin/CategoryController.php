<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create-edit');
    }
    public function edit(Category $category)
    {
        return view('admin.categories.create-edit',compact('category'));
    }
    public function store(CategoryRequest $request)
    {
        $this->validate($request,['image_path'=>'required|image']);
        $category = new Category();
        if($request->hasFile('image_path'))
        {
            $category->image_path=$request->file('image_path')->store('categories','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key))
            {
                $category->translateOrNew($key)->title=$request->get('title_'.$key);
            }
        }
        $category->save();
        return redirect(action('Admin\CategoryController@index'))->with('success','Category Added Successfully');

    }
    public function update(CategoryRequest $request,Category $category)
    {
        if ($request->hasFile('image_path'))
        {
            if (file_exists(storage_path('/storage/'.$category->image_path)))
            {
                unlink(storage_path('/storage/'.$category->image_path));
            }
            $category->image_path=$request->file('image_path')->store('categories','public');
        }
        foreach (\localization::getSupportedLocales() as $key => $values)
        {
            if ($request->get('title_'. $key))
            {
                $category->translateOrNew($key)->title=$request->get('title_'.$key);
            }

        }
        $category->save();
        return redirect(action('Admin\CategoryController@index'))->with('success','Category Updated Successfully');
    }

    public function destory(Category $category)
    {
        if($category->products()->count())
        {
            return back()->with('error', 'Can NOT delete this Category!');
        }
        $deletedCategory=Category::findOrFail($category->id);
        if(file_exists('/storage/'.$category->image_path))
        {
            unlink(storage_path('/storage/'.$category->image_path));

        }
        $deletedCategory->delete();
        return redirect(action('Admin\CategoryController@index'))->with('success', 'Category Deleted Successfully!');


    }




}
