<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home-4 || Truemart Responsive Html5 Ecommerce Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('shop/img/favicon.ico') }}">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{ asset('shop/css/font-awesome.min.css') }}">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{ asset('shop/css/ionicons.min.css') }}">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{ asset('shop/css/linearicons.css') }}">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{ asset('shop/css/nice-select.css') }}">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{ asset('shop/css/jquery.fancybox.css') }}">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{ asset('shop/css/jquery-ui.min.css') }}">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{ asset('shop/css/meanmenu.min.css') }}">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{ asset('shop/css/nivo-slider.css') }}">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.min.css') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('shop/css/default.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('shop/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('shop/css/responsive.css') }}">

    <!-- Modernizer js -->
    <script src="{{ asset('shop/js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->
<!-- Main Wrapper Start Here -->
<div class="wrapper">

    @include('shop.header')

    @yield('content')

    @include('shop.footer')

</div>
<!-- Main Wrapper End Here -->

<!-- jquery 3.2.1 -->
<script src="{{ asset('shop/js/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Countdown js -->
<script src="{{ asset('shop/js/jquery.countdown.min.js') }}"></script>
<!-- Mobile menu js -->
<script src="{{ asset('shop/js/jquery.meanmenu.min.js') }}"></script>
<!-- ScrollUp js -->
<script src="{{ asset('shop/js/jquery.scrollUp.js') }}"></script>
<!-- Nivo slider js -->
<script src="{{ asset('shop/js/jquery.nivo.slider.js') }}"></script>
<!-- Fancybox js -->
<script src="{{ asset('shop/js/jquery.fancybox.min.js') }}"></script>
<!-- Jquery nice select js -->
<script src="{{ asset('shop/js/jquery.nice-select.min.js') }}"></script>
<!-- Jquery ui price slider js -->
<script src="{{ asset('shop/js/jquery-ui.min.js') }}"></script>
<!-- Owl carousel -->
<script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>
<!-- Bootstrap popper js -->
<script src="{{ asset('shop/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>
<!-- Plugin js -->
<script src="{{ asset('shop/js/plugins.js') }}"></script>
<!-- Main activaion js -->
<script src="{{ asset('shop/js/main.js') }}"></script>
</body>
</html>