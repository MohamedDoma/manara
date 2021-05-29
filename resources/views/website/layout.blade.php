<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manara | article </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('website/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('website/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/lightbox.css')}}" >

</head>
<body>


<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <header class="header-bar d-flex align-items-center justify-content-between" data-aos="fade-left">
        <div class="site-logo">
            <a href="{{url('/')}}">Manara</a>
        </div>

        <div class="main-menu">
            <a href="{{route('website.map')}}"><span class="icon-map-marker"></span></a>
            <a href="{{route('website.qr')}}"><span class="icon-qrcode"></span></a>
        </div>
        <div class="site-logo">
            Jubattus
        </div>
    </header>
    @yield('content')

</div> <!-- .site-wrap -->


<script src="{{asset('website/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('website/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('website/js/jquery-ui.js')}}"></script>
<script src="{{asset('website/js/popper.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('website/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('website/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('website/js/aos.js')}}"></script>

<script src="{{asset('website/js/jquery.fancybox.min.js')}}"></script>

<script src="{{asset('website/js/main.js')}}"></script>
<script src="{{asset('website/js/lightbox.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel();
    });
</script>
@stack('scripts')
</body>
</html>
