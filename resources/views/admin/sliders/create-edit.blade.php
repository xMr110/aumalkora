@extends('admin.layouts.app')
@section('title')
    {{ isset($slide) ? 'Edit Slide' : 'Add Slide' }}
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\SliderController@index') }}">Slider</a></li>
    <li class="breadcrumb-item active">{{ isset($slide) ? 'Edit Slide' : 'Add Slide' }}</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ isset($slide) ? 'Edit Slide' : 'Add Slide' }}</h4>

                    <form class="form-material" enctype="multipart/form-data"
                          action="{{ isset($slide) ? action('Admin\SliderController@update', $slide) : action('Admin\SliderController@store') }}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($slide))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    Slide Title *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_{{$key}}">
                                            Slide Title ({{$locale->native()}})
                                        </label>

                                        <textarea
                                                class="form-control form-control-line"
                                                rows="5"
                                                name="title_{{$key}}"
                                                placeholder="{{$locale->native()}}.. ">{{ isset($slide) ? isset($slide->translate($key)->title) ? $slide->translate($key)->title : old('title_'. $key) ?? '' : old('title_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    Slide Description *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description_{{$key}}">

                                            Slide Description ({{$locale->native()}})

                                        </label>

                                        <textarea
                                                class="form-control form-control-line"
                                                rows="5"
                                                name="description_{{$key}}"
                                                placeholder="{{$locale->native()}}.. ">{{ isset($slide) ? isset($slide->translate($key)->description) ? $slide->translate($key)->description : old('description_'. $key) ?? '' : old('description_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">2</span>
                                            Image (1920 * 860) {{ isset($slide) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                    @if(isset($slide) && $slide->image_path != "")
                                        <div class="col-md-12" style="margin: 10px">
                                            <div class="row el-element-overlay">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1">
                                                        <img src="{{ url('/storage/' . $slide->image_path) }}"
                                                             alt="{{$slide->translate('en')->title}}"
                                                             style="background-color: black; max-width: 150px"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">3</span>
                                    Other Options
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="active"
                                           {{ isset($slide) ? 'data-editable data-action=' . action('Admin\SliderController@active', $slide) : '' }} type="checkbox"
                                           id="active" {{ isset($slide) ? $slide->active ? 'checked' : '' : '' }} />
                                    <label for="active">Visible</label>
                                    <br>
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
