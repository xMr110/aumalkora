@extends('layouts.app')
@section('title')
    Products
@endsection
@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/products.css') }}"  media="screen,projection"/>
@endsection

@section('content')
    <section  dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}" class="products-page">
        <div class="container">
            <div class="row">
                <div class="col l12 m12 s12 center-align">
                    <a class='dropdown-button btn categories' href='#' data-activates='categories'><span>Categories</span> <i class="material-icons">dehaze</i></a>

                    <!-- Dropdown Structure -->
                    <ul id='categories' class='dropdown-content'>
                        <li><a href="/categories">All Categories</a></li>
                        @foreach($categories as $category)
                            <li><a href="{{action('SiteController@category',$category)}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
                @foreach($products as $product)
                    <div class="col l4 m6 s12">
                        <div class="product">
                            <div class="product-image">
                                <img class="responsive-img" src="{{url('/storage/'.$product->image_path)}}" width="400">
                            </div>
                            <div class="product-content">
                                <h5 class="product-name">{{$product->title}}</h5>
                                <a href="{{action('SiteController@show',$product)}}" class="btn btn-float">Show Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <section class="pagination-section center-align">
                {{$products->links()}}
            </section>
        </div>
    </section>


@endsection


