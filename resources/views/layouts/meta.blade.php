

<title>AumAlkura - @yield('title')</title>
@if(isset($settings->logo)&& $settings->logo != "")
<link dir="ltr" rel="shortcut icon" href="{{ '/storage/'. $settings->logo }}" type="image/x-icon"/>
@endif
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/materialize.css') }}"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="{{ asset('frontend/ninja/ninja-slider.css') }}"/>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
