@extends('layouts.app')


@section('title')
    About Us
@endsection
@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/about.css') }}"  media="screen,projection"/>
@endsection



@section('content')
    <header>
        <h1 class="center-align">About Us </h1>
<p
    </header>

    <section class="about">
        <div class="container-no">
            <div class="row">
                <div class="goals_pa">
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div class="goals">
                                <p>
                                    @if(config('app.locale')=='en'){!! $settings->about_description_en!!}@elseif(config('app.locale')=='ar'){!! $settings->about_description_ar !!}@else{!! $settings->about_description_tr !!}@endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vision_pa">
                    <div class="row">
                        <div class="about_title">
                            <img src="{{asset('frontend/imgs/eyeglasses.svg')}}" width="100">
                            <h4>@if(config('app.locale')=='en'){{$settings->view_title_en}}@elseif(config('app.locale')=='ar'){{$settings->view_title_ar}}@else{{$settings->view_title_tr}}@endif</h4>
                        </div>
                        <div class="col l12 m12 s12">
                            <div class="vision">
                               <p>
                                   @if(config('app.locale')=='en'){!! $settings->view_description_en!!}@elseif(config('app.locale')=='ar'){!! $settings->view_description_ar !!}@else{!! $settings->view_description_tr !!}@endif
                               </p>
                                         </div>
                        </div>
                    </div>
                </div>
                <div class="goals_pa">
                    <div class="row">
                        <div class="about_title">
                            <img src="{{asset('frontend/imgs/target.svg')}}" width="100">
                            <h4>@if(config('app.locale')=='en'){{$settings->goal_title_en}}@elseif(config('app.locale')=='ar'){{$settings->goal_title_ar}}@else{{$settings->goal_title_tr}}@endif</h4>

                        </div>
                        <div class="col l12 m12 s12">
                            <div class="goals">
                              <p>
                                  @if(config('app.locale')=='en'){!! $settings->goal_description_en!!}@elseif(config('app.locale')=='ar'){!! $settings->goal_description_ar !!}@else{!! $settings->goal_description_tr !!}@endif
                              </p>
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="mission_pa">
                    <div class="row">
                        <div class="about_title">
                            <img src="{{asset('frontend/imgs/email.svg')}}" width="100">
                            <h4>@if(config('app.locale')=='en'){{$settings->message_title_en}}@elseif(config('app.locale')=='ar'){{$settings->message_title_ar}}@else{{$settings->message_title_tr}}@endif</h4>
                        </div>
                        <div class="col l12 m12 s12">
                            <div class="mission">
                             <p>
                                 @if(config('app.locale')=='en'){!! $settings->message_description_en!!}@elseif(config('app.locale')=='ar'){!! $settings->message_description_ar !!}@else{!! $settings->message_description_tr !!}@endif
                             </p>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection