<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $slides= Slider::all()->where('active',1);
        $categories=Category::all();

        return view('index',compact(['slides','categories']));
    }
    public function gallery()
    {
        $albums = Album::all();
        return view('gallery',compact('albums'));
    }
    public function category($category)
    {
        $categories = Category::all();
        $products = Product::where('category_id',$category)->latest()->paginate(6);
        return view('category', compact(['products','categories']));
    }
    public function all(Product $products)
    {
        $categories = Category::all();
        $products = Product::latest()->paginate(6);
        return view('all', compact(['products','categories']));
    }
    public function about()
    {
        return view('about');
    }
    public function speech()
    {
        return view('speech');
    }

    public function getAjax()
    {
        $id = $_GET['id'];
        $album = Album::findOrFail($id);
        $html = '';
        foreach($album->images as $image)
        {
            $html = $html.'<div class="col l3 m6 s12"><img src="' . url('/storage/'.$image->image_path) . '" class="responsive-img materialboxed" width="400" height="200"></div>';

        }
        return $html;
    }


    public function show($product)
    {
        $product = Product::findOrFail($product);
        return view('single',compact('product'));
    }
}
