<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    @include('layouts.meta')
    @yield('style')

</head>

<body>
@include('layouts.navbar')



@yield('content')

@include('layouts.footer')
@include('layouts.scripts')
@yield('script')
</body>

</html>