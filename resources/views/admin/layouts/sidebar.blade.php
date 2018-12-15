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
            </ul>
        </nav>
    </div>
</aside>
