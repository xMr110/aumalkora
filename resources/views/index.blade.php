@extends('layouts.app')


@section('title')
    Home Page
    @endsection


@section('content')
    @if(count($slides))
    <div class="slider">
        <div class="arrows">
            <div class="right right-arrow">
                <a href="javascript:void(0)">
                    <i class="material-icons">keyboard_arrow_right</i>
                </a>
            </div>
            <div class="left left-arrow">
                <a href="javascript:void(0)">
                    <i class="material-icons">keyboard_arrow_left</i>
                </a>
            </div>
        </div>
        <ul class="slides">
            @foreach($slides as $slide)
            <li>
                <img src="{{url('/storage/'.$slide->image_path)}}"> <!-- random image -->
                <div class="caption left-align">
                    <h3>{{$slide->title}}</h3>
                    <h5 class="light grey-text text-lighten-3">{{$slide->description}}</h5>
                </div>
            </li>
                @endforeach

        </ul>
    </div>
@endif

    <section class="about-products">
        <div class="container">
            <h2 class="center-align">About Our Products</h2>
            <div class="row">
                <div class="col l6">
                    <img src="{{isset($settings->ourproduct_image) && $settings->ourproduct_image!= ""? url('/storage/'.$settings->ourproduct_image):''}}" class="responsive-img">
                </div>
                <div class="col l6">
                    <p>
                        {!! config('app.locale') == 'en'? $settings->ourproduct_description_en :  config('app.locale') == 'ar' ? $settings->ourproduct_description_ar : $settings->ourproduct_description_tr!!}
                    </p>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </section>

    <section class="alkura-panel">
        <div class="container">
            <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active">
                            {!! config('app.locale') == 'en'? $settings->index_title_en : ''!!}
                        </div>
                        <div class="collapsible-body"><span><p> {!! config('app.locale') == 'en'? $settings->panel_description_en :''!!}</p></span></div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            {{--{!! config('app.locale') == 'en'? $settings->index_title_en2 :  config('app.locale') == 'ar' ? $settings->index_title_ar2 : $settings->index_title_tr2!!}--}}

                            {!! config('app.locale') == 'en'? $settings->index_title_en2 : ''!!}
                        </div>
                        {{--<div class="collapsible-body"><span><p>{!! config('app.locale') == 'en'? $settings->panel_description_en2 :  config('app.locale') == 'ar' ? $settings->panel_description_ar2 : $settings->panel_description_tr2!!}</p></span></div>--}}

                        <div class="collapsible-body"><span><p>{!! config('app.locale') == 'en'? $settings->panel_description_en2 : ''!!}</p></span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"> {!! config('app.locale') == 'en'? $settings->index_title_en3 : ''!!}</div>
                        <div class="collapsible-body"><span><p>{!! config('app.locale') == 'en'? $settings->panel_description_en3 :  ''!!}</p></span></div>
                    </li>
                </ul>
            </div>
            <div class="divider"></div>
        </div>
    </section>

    <section class="type_of_products">
        <div class="container">
            <h1 class="center-align">Products</h1>
            <div class="row">
                @if(count($products))
                    @foreach($products as $product)
                <div class="col l3 m6 s12">
                    <a href="{{action('SiteController@product',$product)}}">
                        <img src="{{url('/storage/'.$product->image_path)}}" class="responsive-img" alt="new">
                        <h5 class="center-align">{{$product->title}}</h5>
                    </a>
                </div>
                    @endforeach
                    @endif

        </div>
        </div>
    </section>



@endsection



