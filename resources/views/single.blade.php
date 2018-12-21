@extends('layouts.app')



@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/product.css') }}"  media="screen,projection"/>
@endsection



@section('content')



    <section  dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}" class="product-page">
        <div class="product-image">
            <img class="responsive-img" src="{{'/storage/'.$product->image_path}}">
        </div>
        <div class="product-details">
            <h2 class="product-name">Punch</h2>
            <h5 class="product-category">Category: <span>{{$product->category->title}}</span></h5>
            <p class="product-description">
                {!!  $product->description!!}</p>
            <div class="center-align">
                <a href="#" class="btn btn-float request">Add to cart</a>
            </div>
        </div>
    </section>

@endsection