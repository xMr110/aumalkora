@extends('admin.layouts.app')
@section('title')
    Slider
@endsection

@section('bread')
    <li class="breadcrumb-item active">Slider</li>
@endsection


@section('content')

    @if(!count($slides))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-danger">You did,t Add Any Slides.. <i class="mdi mdi-emoticon-neutral"></i>
                        </h1><br>
                        <a href="{{ action('Admin\SliderController@create') }}"><h4><i class="mdi mdi-plus"></i> Add
                            </h4></a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row el-element-overlay">
            @foreach($slides as $slide)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                <img src="{{ '/storage/'. $slide->image_path }}" alt="{{ $slide->title }}"/>
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li><a target="_blank" class="btn default btn-outline image-popup-vertical-fit"
                                               href="{{ '/storage/'. $slide->image_path }}"><i
                                                        class="icon-magnifier"></i></a></li>
                                        <li><a class="btn default btn-outline"
                                               href="{{ action('Admin\SliderController@edit', $slide) }}"><i
                                                        class="icon-pencil"></i></a></li>
                                        <li><a class="btn default btn-outline" data-delete href="javascript:void(0);"><i
                                                        class="icon-trash"></i></a>
                                            <form action="{{ action('Admin\SliderController@destroy', $slide) }}"
                                                  method="post" id="delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                            </form>
                                        </li>

                                        <li><a class="btn default btn-outline"
                                               href="javascript:void(0);" data-editable
                                               data-action="{{ action('Admin\SliderController@active', $slide) }}"><i
                                                        class="mdi ' {{ $slide->active ? 'mdi-eye-off' : 'mdi-eye' }}"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h5 class="box-title">@if(isset($slide->translate('en')->description)){{ str_limit(strip_tags($slide->translate('en')->description)) }}@endif</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection