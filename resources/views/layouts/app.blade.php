<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SCHOOLAUTO') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/web/assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/smooth-scroll/smooth-scroll.js')}}"></script>
    <script src="{{asset('assets/jarallax/jarallax.js')}}"></script>
    <script src="{{asset('assets/senhas/script.js')}}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/animatecss/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/mobirise/css/style.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/senhas/style.css'))}}">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

    <script src="{{asset('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	  <script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>


</head>
<body>
    <div id="app">

        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>



</html>
