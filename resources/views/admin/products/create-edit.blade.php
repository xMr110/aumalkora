@extends('admin.layouts.app')

@section('title')

    {{ isset($product) ? 'Edit' : 'Create Product' }}
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\ProductController@index') }}">All Products</a></li>
    <li class="breadcrumb-item active">Product Create</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Create</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{ isset($product) ? action('Admin\ProductController@update', $product) : action('Admin\ProductController@store') }}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($product))
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
                                               value="{{ isset($product) ? isset($product->translate($key)->title) ? $product->translate($key)->title : old("title_". $key) ?? '' : old("title_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach



                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">2</span>
                                    Description *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description_{{$key}}">{{$locale->native()}}</label>
                                        <textarea name="description_{{$key}}" id="description_{{$key}}" cols="30"
                                                  rows="10"
                                                  class="mymce form-control">{{ isset($product) ? isset($product->translate($key)->description) ? $product->translate($key)->description : old("description_". $key) ?? '' : old("description_". $key) ?? '' }} </textarea>

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">3</span>
                                    Price *
                                </h3>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="price"
                                           placeholder="Number Only"
                                           value="{{ isset($product) ? isset($product->price) ? $product->price : old("price") ?? '' : old("price") ?? '' }} "/>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">4</span>
                                    Quantity *
                                </h3>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="quantity"
                                           placeholder="Number Only"
                                           value="{{ isset($product) ? isset($product->quantity) ? $product->quantity : old("quantity") ?? '' : old("quantity") ?? '' }} "/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">5</span>
                                    Related Category *
                                </h3>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Category">Related Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"  {{ isset($product) ? $product->category_id == $category->id ? 'selected' : '' : '' }}>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">6</span>
                                            Image {{ isset($product) ? '' : '*' }} (1200*400)
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                    @if(isset($product) && $product->image_path != "")
                                        <div class="col-md-12" style="margin: 10px">
                                            <div class="row el-element-overlay">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1">
                                                        <img src="{{ url('/storage/' . $product->image_path) }}"
                                                             alt="{{$product->translate('en')->title}}"
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
                                    <span class="label label-info">7</span>
                                    Other Options
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="active"
                                           {{ isset($product) ? 'data-editable data-action=' . action('Admin\ProductController@active', $product) : '' }} type="checkbox"
                                           id="active" {{ isset($product) ? $product->active ? 'checked' : '' : '' }} />
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