@extends('layouts.app')


@section('title')
    About Us
@endsection
@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/speech.css') }}"  media="screen,projection"/>
@endsection


@section('content')

    <section   dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}" class="speech">
        <div class="container">
            <h1 class="center-align section-title">
                @if(config('app.locale')=='en'){{$settings->Ceo_Name_en}}@elseif(config('app.locale')=='ar'){{$settings->Ceo_Name_ar}}@else{{$settings->Ceo_Name_tr}}@endif</h1>
            <div class="row">
                <div class="col l12 m6 s12">
                    <div class="speech_image center-align">
                        @if(isset($settings->ceo_image) && $settings->ceo_image!='')
                        <img src="{{url('/storage/'.$settings->ceo_image)}}" class="img-responsive" width="300">
                            @endif
                    </div>
                    <div class="speech_text">
                        <p>
                            @if( config('app.locale') == "en"){!! $settings->ceo_description_en!!}@elseif(config('app.locale')=='ar'){!! $settings->ceo_description_ar !!}@else{!! $settings->ceo_description_tr !!}@endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @endsection
