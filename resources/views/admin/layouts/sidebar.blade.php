<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">

            <ul id="sidebarnav">


                <li class="nav-small-cap">Personal</li>
                @if(Auth::user()->role == 1)
                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="mdi mdi-settings"></i>
                            <span class="hide-menu">
                        Settings
                    </span></a>
                        {{--<ul aria-expanded="false" class="collapse">--}}
                            {{--<li><a href="{{ action('Admin\SettingController@index') }}">Manage</a></li>--}}
                        {{--</ul>--}}
                    </li>

                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i
                                    class="mdi mdi-account"></i>
                            <span class="hide-menu">
                        Users
                    </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{action('Admin\UserController@index')}}">All </a></li>
                            <li><a href="{{action('Admin\UserController@create')}}">New</a></li>
                        </ul>
                    </li>
                @endif

                <li class="nav-devider"></li>
                <li class="nav-small-cap">Content Management</li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account"></i>
                        <span class="hide-menu">
                        Slider
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\SliderController@index')}}">All </a></li>
                        <li><a href="{{action('Admin\SliderController@create')}}">New</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account"></i>
                        <span class="hide-menu">
                        Albums
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\AlbumController@index')}}">All </a></li>
                        <li><a href="{{action('Admin\AlbumController@create')}}">New</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account"></i>
                        <span class="hide-menu">
                        Categories
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\CategoryController@index')}}">All </a></li>
                        <li><a href="{{action('Admin\CategoryController@create')}}">New</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account"></i>
                        <span class="hide-menu">
                        Products
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\ProductController@index')}}">All </a></li>
                        <li><a href="{{action('Admin\ProductController@create')}}">New</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account"></i>
                        <span class="hide-menu">
                        Jobs
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\JobController@index')}}">All </a></li>
                        <li><a href="{{action('Admin\JobController@create')}}">New</a></li>
                        <li><a href="{{action('Admin\JobRqtsController@index')}}">Request</a></li>
                    </ul>
                </li>
                <li><a class="waves-effect waves-dark" href="/admin/translations" aria-expanded="false"><i
                                class="mdi mdi-google-translate"></i>
                        <span class="hide-menu">
                        Website Words
                    </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
