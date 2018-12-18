@extends('admin.layouts.app')
@section('title')
    {{ isset($album) ? 'Edit' : 'Create Album' }}
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\AlbumController@index') }}">All Albums</a></li>
    <li class="breadcrumb-item active">{{ isset($album) ? 'Edit' : 'Create Album'}}</li>
@endsection

@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ isset($album) ? 'Edit' : 'Create Album' }}</h4>

                    @if(isset($album))
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#form"
                                                    role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span>
                                    <span class="hidden-xs-down">Album Information</span></a></li>

                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images" role="tab"><span
                                            class="hidden-sm-up"><i class="ti-user"></i></span> <span
                                            class="hidden-xs-down">Manage Album Images</span></a></li>

                        </ul>

                    @endif

                    @if(isset($album))
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="form" role="tabpanel">
                                @endif

                                <form class="form-material" enctype="multipart/form-data"
                                      action="{{ isset($album) ? action('Admin\AlbumController@update', $album) : action('Admin\AlbumController@store') }}"
                                      method="post">
                                    {{ csrf_field() }}

                                    @if(isset($album))
                                        {{ method_field('PATCH') }}
                                    @endif

                                    <div class="row p-t-20">

                                        <div class="col-md-12">
                                            <h3>
                                                <span class="label label-info">1</span>
                                                Title *
                                            </h3>
                                        </div>

                                        @foreach(Localization::getSupportedLocales() as $key => $locale)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title_{{$key}}">{{$locale->native()}}</label>
                                                    <input type="text" class="form-control form-control-line"
                                                           name="title_{{$key}}"
                                                           placeholder="Title for {{$locale->native()}}.. "
                                                           value="{{ isset($album) ? isset($album->translate($key)->title) ? $album->translate($key)->title : old("title_". $key) ?? '' : old("title_". $key) ?? '' }} "/>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">
                                                    <h3>
                                                        <span class="label label-info">2</span>
                                                        Album Image {{ isset($album) ? '' : '*' }}
                                                    </h3>
                                                </label>
                                                <input type="file" name="image_path"
                                                       class="form-control form-control-line">

                                                @if(isset($album) && $album->image_path != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $album->image_path) }}"
                                                                         alt="{{$album->translate('en')->title}}"
                                                                         style="background-color: black; max-width: 150px"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">
                                                    <h3>
                                                        <span class="label label-info">3</span>
                                                        Album Images
                                                    </h3>
                                                </label>
                                                <input type="file" name="images[]" multiple
                                                       class="form-control form-control-line">
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
                                @if(isset($album))
                            </div>
                            <div class="tab-pane" id="images" role="tabpanel">
                                <div class="row el-element-overlay" style="padding-top: 15px">
                                    @foreach($album->images as $image)
                                        <div class="col-md-4" id="img{{ $image->id }}">

                                            <!-- <div class="card"> -->
                                            <div class="el-card-item">
                                                <div class="el-card-avatar el-overlay-1"><img
                                                            src="{{ url('/storage/' . $image->image_path) }}"
                                                            alt="Main Page"/>
                                                    <div class="el-overlay">
                                                        <ul class="el-info">
                                                            <li>
                                                                <a class="btn default btn-outline image-popup-vertical-fit"
                                                                   href="{{ url('/storage/' . $image->image_path) }}"
                                                                   target="_blank"><i class="icon-magnifier"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn default btn-outline image-popup-vertical-fit"
                                                                   data-delete
                                                                   href="#"><i
                                                                            class="icon-trash"></i></a>
                                                                <form action="{{ action('Admin\AlbumImagesController@destroy', $image) }}"
                                                                      method="post" id="delete">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>

                                                            </li>


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
