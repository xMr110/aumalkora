@extends('admin.layouts.app')
@section('title')
    {{ isset($user) ? 'Edit' : 'Create User' }}
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\UserController@index') }}">Site Admins</a></li>
    <li class="breadcrumb-item active">Create Admin</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($user)? action('Admin\UserController@update',$user):action('Admin\UserController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($user))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name ( English Or French )</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="name"
                                           placeholder="Name"
                                           value="{{isset($user)?$user->name:old('name')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emil">Email</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="email"
                                           placeholder="Email"
                                           value="{{isset($user)?$user->email:old('email')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-line"
                                           name="password"
                                           placeholder="Password"
                                           value=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control form-control-line"
                                           name="password_confirmation"
                                           placeholder="Confirm Password"
                                           value=""/>
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
