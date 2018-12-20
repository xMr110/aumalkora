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
                                    {!! isset($settings->about_description_en) ? $settings->about_description_en : '' !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vision_pa">
                    <div class="row">
                        <div class="about_title">
                            <img src="{{asset('frontend/imgs/eyeglasses.svg')}}" width="100">
                            <h4>{{isset($settings->view_title_en)?$settings->view_title_en:''}}</h4>
                        </div>
                        <div class="col l12 m12 s12">
                            <div class="vision">
                               <p>
                                   {!! isset($settings->view_description_en) ? $settings->view_description_en : '' !!}
                               </p>
                                         </div>
                        </div>
                    </div>
                </div>
                <div class="goals_pa">
                    <div class="row">
                        <div class="about_title">
                            <img src="{{asset('frontend/imgs/target.svg')}}" width="100">
                            <h4>{{isset($settings->goal_title_en)?$settings->goal_title_en:''}}</h4>
                        </div>
                        <div class="col l12 m12 s12">
                            <div class="goals">
                              <p>
                                  {!! isset($settings->goal_description_en) ? $settings->goal_description_en : '' !!}
                              </p>
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="mission_pa">
                    <div class="row">
                        <div class="about_title">
                            <img src="{{asset('frontend/imgs/email.svg')}}" width="100">
                            <h4>{{isset($settings->message_title_en)?$settings->message_title_en:''}}</h4>
                        </div>
                        <div class="col l12 m12 s12">
                            <div class="mission">
                             <p>
                                 {!! isset($settings->message_description_en) ? $settings->message_description_en : '' !!}
                             </p>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection