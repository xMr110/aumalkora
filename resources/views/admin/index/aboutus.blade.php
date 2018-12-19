@extends('admin.layouts.app')
@section('title')
    About Us Management
@endsection
@section('bread')
    <li class="breadcrumb-item active"> About Us Management</li>
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
                                <div class="col-md-12"  style="    text-align: center;
                                    background-color: gray;
                                    /* color: white !important; */
                                    padding: 20px 0 20px 0;
                                    border-radius: 3px;
                                    opacity: 0.8;">
                                    <h3 style="color: white;">
                                        Our Goals
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <h3>
                                        <span class="label label-info">1</span>
                                        Title *
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('goal_title_ar') ? 'has-danger' : '' }}">
                                        <label class="control-label">Arabic Title</label>
                                        <input type="text" name="goal_title_ar" class="form-control"
                                               value="{{ $settings->goal_title_ar ?? '' }}">
                                        @if ($errors->has('goal_title_ar'))
                                            <small class="form-control-feedback">{{ $errors->first('goal_title_ar') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('goal_title_en') ? 'has-danger' : '' }}">
                                        <label class="control-label">English Title</label>
                                        <input type="text" name="goal_title_en" class="form-control"
                                               value="{{ $settings->goal_title_en ?? '' }}">
                                        @if ($errors->has('goal_title_en'))
                                            <small class="form-control-feedback">{{ $errors->first('goal_title_en') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('goal_title_tr') ? 'has-danger' : '' }}">
                                        <label class="control-label">Türkçe Title</label>
                                        <input type="text" name="goal_title_tr" class="form-control"
                                               value="{{ $settings->goal_title_tr ?? '' }}">
                                        @if ($errors->has('goal_title_tr'))
                                            <small class="form-control-feedback">{{ $errors->first('goal_title_tr') }}</small>
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
                                        <label class="control-label" for="goal_description_ar">Arabic
                                            Description</label>
                                        <textarea name="goal_description_ar" id="goal_description_ar" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->goal_description_ar) ? $settings->goal_description_ar : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <label class="control-label" for="goal_description_en">English
                                            Description</label>
                                        <textarea name="goal_description_en" id="goal_description_en" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->goal_description_en) ? $settings->goal_description_en : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="goal_description_tr">Türkçe
                                            Description</label>
                                        <textarea name="goal_description_tr" id="goal_description_tr" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->goal_description_tr) ? $settings->goal_description_tr : '' }}</textarea>
                                    </div>
                                </div>
                                <!--/row-->

                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-12"  style="    text-align: center;
                                    background-color: gray;
                                    /* color: white !important; */
                                    padding: 20px 0 20px 0;
                                    border-radius: 3px;
                                    opacity: 0.8;">
                                    <h3 style="color: white;">
                                        Our Message
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <h3>
                                        <span class="label label-info">1</span>
                                        Title *
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('message_title_ar') ? 'has-danger' : '' }}">
                                        <label class="control-label">Arabic Title</label>
                                        <input type="text" name="message_title_ar" class="form-control"
                                               value="{{ $settings->message_title_ar ?? '' }}">
                                        @if ($errors->has('message_title_ar'))
                                            <small class="form-control-feedback">{{ $errors->first('message_title_ar') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('message_title_en') ? 'has-danger' : '' }}">
                                        <label class="control-label">English Title</label>
                                        <input type="text" name="message_title_en" class="form-control"
                                               value="{{ $settings->message_title_en ?? '' }}">
                                        @if ($errors->has('message_title_en'))
                                            <small class="form-control-feedback">{{ $errors->first('message_title_en') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('message_title_tr') ? 'has-danger' : '' }}">
                                        <label class="control-label">Türkçe Title</label>
                                        <input type="text" name="message_title_tr" class="form-control"
                                               value="{{ $settings->message_title_tr ?? '' }}">
                                        @if ($errors->has('message_title_tr'))
                                            <small class="form-control-feedback">{{ $errors->first('message_title_tr') }}</small>
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
                                        <label class="control-label" for="message_description_ar">Arabic
                                            Description</label>
                                        <textarea name="message_description_ar" id="message_description_ar" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->message_description_ar) ? $settings->message_description_ar : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="message_description_en">English
                                            Description</label>
                                        <textarea name="message_description_en" id="message_description_en" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->message_description_en) ? $settings->message_description_en : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="message_description_tr">Türkçe
                                            Description</label>
                                        <textarea name="message_description_tr" id="message_description_tr" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->message_description_tr) ? $settings->message_description_tr : '' }}</textarea>
                                    </div>
                                </div>
                                <!--/row-->

                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-12"  style="    text-align: center;
                                    background-color: gray;
                                    /* color: white !important; */
                                    padding: 20px 0 20px 0;
                                    border-radius: 3px;
                                    opacity: 0.8;">
                                    <h3 style="color: white;">
                                        Our View
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <h3>
                                        <span class="label label-info">1</span>
                                        Title *
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('view_title_ar') ? 'has-danger' : '' }}">
                                        <label class="control-label">Arabic Title</label>
                                        <input type="text" name="view_title_ar" class="form-control"
                                               value="{{ $settings->view_title_ar ?? '' }}">
                                        @if ($errors->has('view_title_ar'))
                                            <small class="form-control-feedback">{{ $errors->first('view_title_ar') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('view_title_en') ? 'has-danger' : '' }}">
                                        <label class="control-label">English Title</label>
                                        <input type="text" name="view_title_en" class="form-control"
                                               value="{{ $settings->view_title_en ?? '' }}">
                                        @if ($errors->has('view_title_en'))
                                            <small class="form-control-feedback">{{ $errors->first('view_title_en') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('view_title_tr') ? 'has-danger' : '' }}">
                                        <label class="control-label">Türkçe Title</label>
                                        <input type="text" name="view_title_tr" class="form-control"
                                               value="{{ $settings->view_title_tr ?? '' }}">
                                        @if ($errors->has('view_title_tr'))
                                            <small class="form-control-feedback">{{ $errors->first('view_title_tr') }}</small>
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
                                        <label class="control-label" for="view_description_ar">Arabic
                                            Description</label>
                                        <textarea name="view_description_ar" id="view_description_ar" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->view_description_ar) ? $settings->view_description_ar : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="view_description_en">English
                                            Description</label>
                                        <textarea name="view_description_en" id="view_description_en" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->view_description_en) ? $settings->view_description_en : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="view_description_tr">Türkçe
                                            Description</label>
                                        <textarea name="view_description_tr" id="view_description_tr" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->view_description_tr) ? $settings->view_description_tr : '' }}</textarea>
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

