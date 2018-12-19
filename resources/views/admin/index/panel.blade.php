@extends('admin.layouts.app')
@section('title')
    Panel Management
@endsection
@section('bread')
    <li class="breadcrumb-item active"> Panel Management</li>
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data"
                          class="form-material">

                        {{ csrf_field() }}

                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <h3>
                                        <span class="label label-info">1</span>
                                        Title *
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('index_title_ar') ? 'has-danger' : '' }}">
                                        <label class="control-label">Arabic Title</label>
                                        <input type="text" name="index_title_ar" class="form-control"
                                               value="{{ $settings->index_title_ar ?? '' }}">
                                        @if ($errors->has('index_title_ar'))
                                            <small class="form-control-feedback">{{ $errors->first('index_title_ar') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('index_title_en') ? 'has-danger' : '' }}">
                                        <label class="control-label">English Title</label>
                                        <input type="text" name="index_title_en" class="form-control"
                                               value="{{ $settings->index_title_en ?? '' }}">
                                        @if ($errors->has('index_title_en'))
                                            <small class="form-control-feedback">{{ $errors->first('index_title_en') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('index_title_tr') ? 'has-danger' : '' }}">
                                        <label class="control-label">Türkçe Title</label>
                                        <input type="text" name="index_title_tr" class="form-control"
                                               value="{{ $settings->index_title_tr ?? '' }}">
                                        @if ($errors->has('index_title_tr'))
                                            <small class="form-control-feedback">{{ $errors->first('index_title_tr') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>
                                        <span class="label label-info">2</span>
                                        Description *
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="panel_description_ar">Arabic
                                            Description</label>
                                        <textarea name="panel_description_ar" id="panel_description_ar" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->panel_description_ar) ? $settings->panel_description_ar : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="panel_description_en">English
                                            Description</label>
                                        <textarea name="panel_description_en" id="panel_description_en" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->panel_description_en) ? $settings->panel_description_en : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="panel_description_tr">Türkçe
                                            Description</label>
                                        <textarea name="panel_description_tr" id="panel_description_tr" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->panel_description_tr) ? $settings->panel_description_tr : '' }}</textarea>
                                    </div>
                                </div>
                                <!--/row-->

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

