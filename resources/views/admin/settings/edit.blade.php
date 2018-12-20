@extends('admin.layouts.app')
@section('title')
    Settings
@endsection

@section('bread')
    <li class="breadcrumb-item active">Settings</li>
@endsection

@section('style')

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

                            <h3 class="card-title">Modify Site Settings</h3>

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#basics"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-home"></i></span> <span
                                                class="hidden-xs-down">Basics</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#social"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span class="hidden-xs-down">Social Media</span></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span
                                                class="hidden-xs-down">Contact Us</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ceo"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span
                                                class="hidden-xs-down">CEO</span></a></li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="basics" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" class="form-control"
                                                       value="{{ $settings->title ?? '' }}">
                                                @if ($errors->has('title'))
                                                    <small class="form-control-feedback">{{ $errors->first('title') }}</small>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('favicon') ? 'has-danger' : '' }}">
                                                <label class="control-label">Site Icon</label>
                                                <input type="file" name="favicon" class="form-control">

                                                @if ($errors->has('favicon'))
                                                    <small class="form-control-feedback">{{ $errors->first('favicon') }}</small>
                                                @endif

                                                @if(isset($settings->favicon) && $settings->favicon != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1"><img
                                                                            src="{{ '/storage/'. $settings->favicon }}"
                                                                            alt="Main Page"
                                                                            style="background-color: black; max-width: 150px">
                                                                    <div class="el-overlay">
                                                                        <ul class="el-info">
                                                                            <li>
                                                                                <a class="btn default btn-outline image-popup-vertical-fit"
                                                                                   href="{{ '/storage/'. $settings->favicon }}"
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



                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('logo') ? 'has-danger' : '' }}">
                                                <label class="control-label">Logo Icon</label>
                                                <input type="file" name="logo" class="form-control">

                                                @if ($errors->has('logo'))
                                                    <small class="form-control-feedback">{{ $errors->first('logo') }}</small>
                                                @endif

                                                @if(isset($settings->logo) && $settings->logo != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1"><img
                                                                            src="{{ '/storage/'. $settings->logo }}"
                                                                            alt="Main Page"
                                                                            style="background-color: black; max-width: 150px">
                                                                    <div class="el-overlay">
                                                                        <ul class="el-info">
                                                                            <li>
                                                                                <a class="btn default btn-outline image-popup-vertical-fit"
                                                                                   href="{{ '/storage/'. $settings->logo }}"
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

                                    </div>
                                </div>

                                <div class="tab-pane" id="social" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                                                <label class="control-label">Facebook</label>
                                                <input type="text" name="facebook" class="form-control"
                                                       value="{{ $settings->facebook ?? '' }}">
                                                @if ($errors->has('facebook'))
                                                    <small class="form-control-feedback">{{ $errors->first('facebook') }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                                                <label class="control-label">Instagram</label>
                                                <input type="text" name="instagram" class="form-control"
                                                       value="{{ $settings->instagram ?? '' }}">
                                                @if ($errors->has('instagram'))
                                                    <small class="form-control-feedback">{{ $errors->first('instagram') }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                                                <label class="control-label">Twitter</label>
                                                <input type="text" name="twitter" class="form-control"
                                                       value="{{ $settings->twitter ?? '' }}">
                                                @if ($errors->has('twitter'))
                                                    <small class="form-control-feedback">{{ $errors->first('twitter') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="contact" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                                <label class="control-label">Cell-Phone Number</label>
                                                <input type="text" name="phone" class="form-control"
                                                       value="{{ $settings->phone ?? '' }}">
                                                @if ($errors->has('phone'))
                                                    <small class="form-control-feedback">{{ $errors->first('phone') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('phone2') ? 'has-danger' : '' }}">
                                                <label class="control-label">Cell-Phone Number #2</label>
                                                <input type="text" name="phone2" class="form-control"
                                                       value="{{ $settings->phone2 ?? '' }}">
                                                @if ($errors->has('phone2'))
                                                    <small class="form-control-feedback">{{ $errors->first('phone2') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                                <label class="control-label">Address</label>
                                                <input type="text" name="address" class="form-control"
                                                       value="{{ $settings->address ?? '' }}">
                                                @if ($errors->has('address'))
                                                    <small class="form-control-feedback">{{ $errors->first('address') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('telephone') ? 'has-danger' : '' }}">
                                                <label class="control-label">Land Phone</label>
                                                <input type="text" name="telephone" class="form-control"
                                                       value="{{ $settings->telephone ?? '' }}">
                                                @if ($errors->has('telephone'))
                                                    <small class="form-control-feedback">{{ $errors->first('telephone') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                                <label class="control-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                       value="{{ $settings->email ?? '' }}">
                                                @if ($errors->has('email'))
                                                    <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane" id="ceo" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('Ceo_Name_ar') ? 'has-danger' : '' }}">
                                                <label class="control-label">Full Name بالعربية</label>
                                                <input type="text" name="Ceo_Name_ar" class="form-control"
                                                       value="{{ $settings->Ceo_Name_ar ?? '' }}">
                                                @if ($errors->has('Ceo_Name_ar'))
                                                    <small class="form-control-feedback">{{ $errors->first('Ceo_Name_ar') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('Ceo_Name_en') ? 'has-danger' : '' }}">
                                                <label class="control-label">Full Name English</label>
                                                <input type="text" name="Ceo_Name_en" class="form-control"
                                                       value="{{ $settings->Ceo_Name_en ?? '' }}">
                                                @if ($errors->has('Ceo_Name_en'))
                                                    <small class="form-control-feedback">{{ $errors->first('Ceo_Name_en') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('Ceo_Name_tr') ? 'has-danger' : '' }}">
                                                <label class="control-label">Full Name Türkçe</label>
                                                <input type="text" name="Ceo_Name_tr" class="form-control"
                                                       value="{{ $settings->Ceo_Name_tr ?? '' }}">
                                                @if ($errors->has('Ceo_Name_tr'))
                                                    <small class="form-control-feedback">{{ $errors->first('Ceo_Name_tr') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_description_ar') ? 'has-danger' : '' }}">
                                                <label class="control-label">Description بالعربية</label>
                                                <textarea
                                                        class="form-control form-control-line mymce"
                                                        rows="5"
                                                        name="ceo_description_ar"
                                                        placeholder="">{{ $settings->ceo_description_ar ?? '' }}</textarea>

                                            @if ($errors->has('ceo_description_ar'))
                                                    <small class="form-control-feedback">{{ $errors->first('ceo_description_ar') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_description_en') ? 'has-danger' : '' }}">
                                                <label class="control-label">Description English</label>
                                                <textarea
                                                        class="form-control form-control-line mymce"
                                                        rows="5"
                                                        name="ceo_description_en"
                                                        placeholder="">{{ $settings->ceo_description_en ?? '' }}</textarea>

                                            @if ($errors->has('ceo_description_en'))
                                                    <small class="form-control-feedback">{{ $errors->first('ceo_description_en') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_description_tr') ? 'has-danger' : '' }}">
                                                <label class="control-label">Description Türkçe</label>
                                                {{--<input type="text" name="ceo_description_tr" class="form-control"--}}
                                                       {{--value="{{ $settings->ceo_description_tr ?? '' }}">--}}
                                                <textarea
                                                        class="form-control form-control-line mymce"
                                                        rows="5"
                                                        name="ceo_description_tr"
                                                        placeholder="">{{ $settings->ceo_description_tr ?? '' }}</textarea>

                                            @if ($errors->has('ceo_description_tr'))
                                                    <small class="form-control-feedback">{{ $errors->first('ceo_description_tr') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('ceo_image') ? 'has-danger' : '' }}">
                                                <label class="control-label">CEO Image</label>
                                                <input type="file" name="ceo_image" class="form-control">

                                                @if ($errors->has('ceo_image'))
                                                    <small class="form-control-feedback">{{ $errors->first('ceo_image') }}</small>
                                                @endif

                                                @if(isset($settings->ceo_image) && $settings->ceo_image != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1"><img
                                                                            src="{{ '/storage/'. $settings->ceo_image }}"
                                                                            alt="Main Page"
                                                                            style="background-color: black; max-width: 150px">
                                                                    <div class="el-overlay">
                                                                        <ul class="el-info">
                                                                            <li>
                                                                                <a class="btn default btn-outline image-popup-vertical-fit"
                                                                                   href="{{ '/storage/'. $settings->ceo_image }}"
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

                                    </div>
                                </div>
                                </div>
                            </div>
                            <!--/span-->
                            <!--/row-->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')

@endsection