@extends('layouts.app')


@section('title')
    Home Page
    @endsection


@section('content')
    @if(count($slides))
    <div  class="slider">
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
        <ul class="slides" >
            @foreach($slides as $slide)
            <li  dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                <img src="{{url('/storage/'.$slide->image_path)}}"> <!-- random image -->
                <div class="caption  @if(config('app.locale') != "ar")  left-align @elseif(config('app.locale') == "ar") right-align @endif">
                    <h3>{{$slide->title}}</h3>
                    <h5 class="light grey-text text-lighten-3">{{$slide->description}}</h5>
                </div>
            </li>
                @endforeach

        </ul>
    </div>
@endif

    <section  dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}" class="about-products">
        <div class="container">
            <h2 class="center-align">About Our Products</h2>
            <div class="row">
                <div class="col l6">
                    <img src="{{isset($settings->ourproduct_image) && $settings->ourproduct_image!= ""? url('/storage/'.$settings->ourproduct_image):''}}" class="responsive-img">
                </div>
                <div class="col l6">
                    <p>
                        @if(config('app.locale')=='en'){!! $settings->ourproduct_description_en!!}@elseif(config('app.locale')=='ar'){!! $settings->ourproduct_description_ar !!}@else{!! $settings->ourproduct_description_tr !!}@endif
                    </p>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </section>

    <section class="alkura-panel"   dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <div class="container">
            <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active">
                            @if(config('app.locale')=='en'){{$settings->index_title_en}}@elseif(config('app.locale')=='ar'){{$settings->index_title_ar}}@else{{$settings->index_title_tr}}@endif
                            {{--{!! config('app.locale') == 'en'? $settings->index_title_en : ''!!}--}}
                        </div>
                        <div class="collapsible-body"><span><p> @if(config('app.locale')=='en'){!! $settings->panel_description_en!!}@elseif(config('app.locale')=='ar'){!! $settings->panel_description_ar !!}@else{!! $settings->panel_description_tr !!}@endif</p></span></div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            {{--{!! config('app.locale') == 'en'? $settings->index_title_en2 :  config('app.locale') == 'ar' ? $settings->index_title_ar2 : $settings->index_title_tr2!!}--}}
                            @if(config('app.locale')=='en'){{$settings->index_title_en2}}@elseif(config('app.locale')=='ar'){{$settings->index_title_ar2}}@else{{$settings->index_title_tr2}}@endif
                        </div>
                        {{--<div class="collapsible-body"><span><p>{!! config('app.locale') == 'en'? $settings->panel_description_en2 :  config('app.locale') == 'ar' ? $settings->panel_description_ar2 : $settings->panel_description_tr2!!}</p></span></div>--}}
                        <div class="collapsible-body"><span><p> @if(config('app.locale')=='en'){!! $settings->panel_description_en2!!}@elseif(config('app.locale')=='ar'){!! $settings->panel_description_ar2 !!}@else{!! $settings->panel_description_tr2 !!}@endif</p></span></div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            @if(config('app.locale')=='en'){{$settings->index_title_en3}}@elseif(config('app.locale')=='ar'){{$settings->index_title_ar3}}@else{{$settings->index_title_tr3}}@endif
                        </div>
                        <div class="collapsible-body"><span><p> @if(config('app.locale')=='en'){!! $settings->panel_description_en3!!}@elseif(config('app.locale')=='ar'){!! $settings->panel_description_ar3 !!}@else{!! $settings->panel_description_tr3 !!}@endif</p></span></div>
                    </li>
                </ul>
            </div>
            <div class="divider"></div>
        </div>
    </section>

    <section class="type_of_products"   dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <div class="container">
            <h1 class="center-align">Products</h1>
            <div class="row">
                @if(count($categories))
                    @foreach($categories as $category)
                <div  @if( config('app.locale') == 'ar') style="float: right!important;" @endif class="col l3 m6 s12">
                    <a href="{{action('SiteController@category',$category)}}">
                        <img src="{{url('/storage/'.$category->image_path)}}" class="responsive-img" alt="new">
                        <h5 class="center-align">{{$category->title}}</h5>
                    </a>
                </div>
                    @endforeach
                    @endif

        </div>
        </div>
    </section>

    <section class="contact-us" >
        <div class="container">
            <div class="row">
                <div class="col l4 m6 s12">
                    <div class="contact" id="contact">
                        <div class="logo">

                            @if(isset($settings->logo)&& $settings->logo != "")
                                <img class="responsive-img" src="{{ url('/storage/'. $settings->logo) }}" width="150">
                            @endif
                        </div>
                        <div class="location">
                            <i class="material-icons">location_on</i>
                            <p>{{isset($settings->address) ? $settings->address : ''}}</p>
                        </div>
                        <div class="phone">
                            <i class="material-icons">phone</i>
                            <p>{{isset($settings->phone) ? $settings->phone : ''}}</p>
                        </div>
                        <div class="email">
                            <i class="material-icons">email</i>
                            <p>{{isset($settings->email) ? $settings->email : ''}}</p>
                        </div>
                    </div>
                </div>

                <div class="col l8 m12 s12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1643777.1890646918!2d42.04041955674209!3d36.421234559044464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x400976912dee2dfb%3A0x1735b67e4a2454b0!2z2YXYrdin2YHYuNipINin2YTYrdiz2YPYqdiMINiz2YjYsdmK2Kc!5e0!3m2!1sar!2s!4v1521869294564" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>



@endsection



