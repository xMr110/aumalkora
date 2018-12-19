<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $slides= Slider::all()->where('active',1);
        $products=Product::all()->where('active', 1);
        return view('index',compact(['slides','products']));
    }
    public function product($product)
    {
        return view('single', compact('product'));
    }
}
