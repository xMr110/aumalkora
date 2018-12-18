@extends('admin.layouts.app')
@section('title')
    {{ isset($job) ? 'Edit' : 'Create Job' }}
@endsection
@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\JobController@index') }}">All Jobs</a></li>
    <li class="breadcrumb-item active">Job Create</li>
@endsection
@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Job Create</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{ isset($job) ? action('Admin\JobController@update', $job) : action('Admin\JobController@store') }}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($job))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">


                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                   Job Name *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_{{$key}}"> Name {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="name_{{$key}}"
                                               placeholder="Name for {{$locale->native()}}.. "
                                               value="{{ isset($job) ? isset($job->translate($key)->name) ? $job->translate($key)->name : old("name_". $key) ?? '' : old("name_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">2</span>
                                    Job Title *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_{{$key}}"> Name {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="title_{{$key}}"
                                               placeholder="Name for {{$locale->native()}}.. "
                                               value="{{ isset($job) ? isset($job->translate($key)->title) ? $job->translate($key)->title : old("title_". $key) ?? '' : old("title_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">3</span>
                                    Job Description *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description_{{$key}}">

                                            Job Description ({{$locale->native()}})

                                        </label>

                                        <textarea
                                                class="form-control form-control-line"
                                                rows="5"
                                                name="description_{{$key}}"
                                                placeholder="{{$locale->native()}}.. ">{{ isset($job) ? isset($job->translate($key)->description) ? $job->translate($key)->description : old('description_'. $key) ?? '' : old('description_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">4</span>
                                    Job Code *
                                </h3>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code"> Code</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="code"
                                               placeholder="Job code.. "
                                               value="{{ isset($job) ? isset($job->code) ? $job->code : old("code") ?? '' : old("code") ?? '' }} "/>
                                    </div>
                                </div>

                            <div class="col-md-12">
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-success btn-rounded" type="submit">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


