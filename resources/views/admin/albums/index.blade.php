@extends('admin.layouts.app')
@section('title')
    albums
@endsection

@section('bread')
    <li class="breadcrumb-item active">Albums</li>
@endsection

@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')

    @if(!count($albums))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-danger">You did,t add any Albums yet.. <i class="mdi mdi-emoticon-neutral"></i>
                        </h1><br>
                        <a href="{{ action('Admin\AlbumController@create') }}"><h4><i class="mdi mdi-plus"></i> Add
                            </h4></a>
                    </div>
                </div>
            </div>
        </div>
    @else

        <div class="row el-element-overlay">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"><img
                                    src="/assets/backend/images/new-slide.jpg" alt="New Album"/>
                            <div class="el-overlay">
                                <ul class="el-info">
                                    <li><a class="btn default btn-outline"
                                           href="{{ action('Admin\AlbumController@create') }}"><i
                                                    class="mdi mdi-plus"></i></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="el-card-content">
                            <h3 class="box-title"><a href="{{ action('Admin\AlbumController@create') }}">Add</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($albums as $album)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"><img
                                        src="{{ url('/storage/' . $album->image_path) }}"
                                        alt="{{ $album->title }}"/>
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li><a target="_blank"
                                               class="btn default btn-outline image-popup-vertical-fit"
                                               href="{{ url('/storage/' . $album->image_path) }}"><i
                                                        class="icon-magnifier"></i></a></li>
                                        <li><a class="btn default btn-outline"
                                               href="{{ action('Admin\AlbumController@edit', $album) }}"><i
                                                        class="icon-pencil"></i></a></li>
                                        <li><a class="btn default btn-outline" data-delete
                                               href="javascript:void(0);"><i
                                                        class="icon-trash"></i></a>
                                            <form action="{{ action('Admin\AlbumController@destroy', $album) }}"
                                                  method="post" id="delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                            </form>
                                        </li>



                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title">{{ $album->title }}</h3>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @endif


@endsection
