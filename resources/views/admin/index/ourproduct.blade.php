@extends('admin.layouts.app')
@section('title')
  About Our Products
@endsection
@section('bread')
    <li class="breadcrumb-item active"> About Our Products</li>
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
                                        <span class="label label-info">2</span>
                                        Description *
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="ourproduct_description_ar">Arabic
                                            Description</label>
                                        <textarea name="ourproduct_description_ar" id="ourproduct_description_ar" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->ourproduct_description_ar) ? $settings->ourproduct_description_ar : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="ourproduct_description_en">English
                                            Description</label>
                                        <textarea name="ourproduct_description_en" id="ourproduct_description_en" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->ourproduct_description_en) ? $settings->ourproduct_description_en : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="ourproduct_description_tr">Türkçe
                                            Description</label>
                                        <textarea name="ourproduct_description_tr" id="ourproduct_description_tr" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($settings->ourproduct_description_tr) ? $settings->ourproduct_description_tr : '' }}</textarea>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">2</span>
                                            Image {{ isset($settings->ourproduct_image) ? '' : '*' }} (1280*720)
                                        </h3>
                                    </label>
                                    <div class="form-group {{ $errors->has('ourproduct_image') ? 'has-danger' : '' }}">
                                        <label class="control-label">Our Products Image</label>
                                        <input type="file" name="ourproduct_image" class="form-control">

                                        @if ($errors->has('ourproduct_image'))
                                            <small class="form-control-feedback">{{ $errors->first('ourproduct_image') }}</small>
                                        @endif

                                        @if(isset($settings->ourproduct_image) && $settings->ourproduct_image != "")
                                            <div class="col-md-12" style="margin: 10px">
                                                <div class="row el-element-overlay">
                                                    <div class="el-card-item">
                                                        <div class="el-card-avatar el-overlay-1"><img
                                                                    src="{{ '/storage/'. $settings->ourproduct_image }}"
                                                                    alt="Main Page"
                                                                    style="background-color: black; max-width: 150px">
                                                            <div class="el-overlay">
                                                                <ul class="el-info">
                                                                    <li>
                                                                        <a class="btn default btn-outline image-popup-vertical-fit"
                                                                           href="{{ '/storage/'. $settings->ourproduct_image }}"
                                                                           target="_blank"><i
                                                                                    class="icon-magnifier"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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

