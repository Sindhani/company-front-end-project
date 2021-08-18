<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Saas Startup App HTML Template">
        <meta name="author" content="DynamicLayers">
       
        <title>Truno | Saas Startup App HTML Template</title>
        
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front_end/img/favicon.png')}}">
		
        <link rel="stylesheet" href="{{asset('assets/front_end/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/elegant-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/truno-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/slicknav.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/pricing-table.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/odometer.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/venobox.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front_end/css/responsive.css')}}">

        <script src="{{asset('assets/front_end/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    </head>
    <body data-spy="scroll" data-target="#mainmenu" data-offset="70">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        @include('front_end.layouts.spinner')
        
        @include('front_end.layouts.header')
        
        @yield('contents')
        
        @include('front_end.layouts.footer')

		<a data-scroll href="#header" id="scroll-to-top"><i class="ti-arrow-up"></i></a>
	
		<!-- jQuery Lib -->
        <script src="{{asset('assets/front_end/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/tether.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/jquery.slicknav.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/smooth-scroll.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/pricing-switcher.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/jquery.waypoints.v2.0.3.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/odometer.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/wow.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/vendor/venobox.min.js')}}"></script>
        <script src="{{asset('assets/front_end/js/main.js')}}"></script>

    </body>
</html>