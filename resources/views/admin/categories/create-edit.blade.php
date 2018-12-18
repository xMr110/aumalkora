@extends('admin.layouts.app')

@section('title')
    {{ isset($category) ? 'Edit' : 'Create Category' }}
    @endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\CategoryController@index') }}">All Categories</a></li>
    <li class="breadcrumb-item active">Category Create</li>
@endsection
@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Category Create</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{ isset($category) ? action('Admin\CategoryController@update', $category) : action('Admin\CategoryController@store') }}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($category))
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
                                               value="{{ isset($category) ? isset($category->translate($key)->title) ? $category->translate($key)->title : old("title_". $key) ?? '' : old("title_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">3</span>
                                            Image {{ isset($category) ? '' : '*' }} (1200*400)
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                    @if(isset($category) && $category->image_path != "")
                                        <div class="col-md-12" style="margin: 10px">
                                            <div class="row el-element-overlay">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1">
                                                        <img src="{{ url('/storage/' . $category->image_path) }}"
                                                             alt="{{$category->translate('en')->title}}"
                                                             style="background-color: black; max-width: 150px"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
