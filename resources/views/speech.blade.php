@extends('layouts.app')


@section('title')
    About Us
@endsection
@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/speech.css') }}"  media="screen,projection"/>
@endsection


@section('content')

    <section class="speech">
        <div class="container">
            <h1 class="center-align section-title">{{isset($settings->Ceo_Name_en)?$settings->Ceo_Name_en:''}}</h1>
            <div class="row">
                <div class="col l12 m6 s12">
                    <div class="speech_image center-align">
                        @if(isset($settings->ceo_image) && $settings->ceo_image!='')
                        <img src="{{url('/storage/'.$settings->ceo_image)}}" class="img-responsive" width="300">
                            @endif
                    </div>
                    <div class="speech_text">
                        <p>
                            {!! isset($settings->ceo_description_en)?$settings->ceo_description_en:'' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @endsection
