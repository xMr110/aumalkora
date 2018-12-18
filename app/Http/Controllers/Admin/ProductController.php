<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{


    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create-edit',compact('categories'));

    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.create-edit',compact(['product','categories']));

    }

    public function store(ProductRequest $request)
    {
        $this->validate($request,['image_path'=>'required|image']);
        $product= new Product();
        $product->category_id = $request->category;
        if ($request->hasFile('image_path'))
        {
            $product->image_path=$request->file('image_path')->store('products','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $value) {
            if ($request->get('title_' . $key)) {
                $product->translateOrNew($key)->title = $request->get('title_' . $key);
            }
            if ($request->get('description_' . $key)) {
                $product->translateOrNew($key)->description = $request->get('description_' . $key);
            }
        }
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->active = $request->has('active') ? 1 : 0;
        $product->category_id=$request->get('category_id');
        $product->save();
        return redirect(action('Admin\ProductController@index'))->with('Success','Product Added Successfully');


    }
    public function update(Product $product,ProductRequest $request)
    {
        if ($request->hasFile('image_path'))
        {
            if (file_exists(storage_path('/storage/'.$product->image_path)))
            {
                unlink(storage_path('/storage/'.$product->image_path));
            }
            $product->image_path=$request->file('image_path')->store('products','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key)) {
                $product->translateOrNew($key)->title = $request->get('title_' . $key);
            }
            if ($request->get('description_' . $key)) {
                $product->translateOrNew($key)->description = $request->get('description_' . $key);
            }

        }
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->active = $request->has('active') ? 1 : 0;
        $product->category_id=$request->get('category_id');
        $product->save();
        return redirect(action('Admin\ProductController@index'))->with('Success','Product Added Successfully');



        }

        public function destroy(Product $product)
        {
            $DeletedProduct = Product::findOrFail($product->id);
            if (file_exists(storage_path('/storage/'.$product->image_path)))
            {
                unlink(storage_path('/storage/'.$product->image_path));
            }
            $DeletedProduct->delete();
            return redirect(action('Admin\ProductController@index'))->with('Success','Product Deleted Successfully');
        }

    public function active(Product $product)
    {
        return $this->set_editable($product, 'active');
    }




}
