<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="Responsive HTML Template">
        <meta name="description" content="Funky Yak">
        <meta name="author" content="Funky Yak">

        <title> @yield('title', '')</title>

        <link href="{{ asset('/img/favicon.ico')}}" rel="SHORTCUT ICON" />


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-material/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">

        <link rel="stylesheet" href="{{ asset('vendor/nivo-slider/css/nivo-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/nivo-slider/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/nivo-slider/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/slider-range/css/jslider.css') }}">

        <!-- Template Custom CSS -->
      
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/theme-global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-product.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-product-list.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-blog.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-responsive.css') }}">

        <!-- Template Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

    @yield('extra-js')
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/nivo-slider/js/jquery.nivo.slider.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/tmpl.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/jquery.dependClass-0.1.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/draggable-0.1.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/jquery.slider.js') }}"></script>

        
        <script src="{{ asset('vendor/jquery.elevatezoom/jquery.elevatezoom.js') }}"></script>
        
        <!-- Template Base, Components and Settings -->
        <script src="{{ asset('js/theme.js') }}"></script>



        <!-- Template Custom -->
        <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
