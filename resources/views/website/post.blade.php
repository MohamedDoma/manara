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
            <a href="index.html">Manara</a>
        </div>

        <div class="main-menu">
            <a href="map.html"><span class="icon-map-marker"></span></a>
            <a href="qr.html"><span class="icon-qrcode"></span></a>
        </div>
        <div class="site-logo">
            Jubattus
        </div>
    </header>
    <main class="main-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-10 p-4 " style="" data-aos="fade-top">
                <img src="{{ $post->featured_image }}" alt="Image" class="img-fluid">

            </div>
        </div>
        <div class="container bg-white p-0" style="transform: translateY(-200px)">
            <div class="col-md-6 text-center p-4 d-flex justify-content-between" style="margin:0 auto;">
                <button class="btn btn-primary">
                    خيار
                </button>

            </div>
            <div class="col-md-12 text-center p-4" >
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="col-md-12 text-center p-4" data-aos="fade-up">
                <p>
                    {{ $post->post_body }}</p>
                    @foreach($post->sections as $section)
                        <h2 class="p-4">{{$section->post_id}}</h2>
                        <p>
                           {{ $section->content}}
                        </p>
                @endforeach
            </div>
            <div class="col-md-12 text-center" data-aos="fade-up">
                <h1>الصور</h1>
                <div class="owl-carousel owl-theme">
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" />
                </div>
            </div>
            <div class="col-md-12 text-center p-0 " data-aos="fade-up">
                <h1 class="p-3">هل تعلم</h1>
                <div class="bg-secondary p-4 text-white">انت كويس</div>
            </div>
            <div class="col-md-12 text-center p-0 " data-aos="fade-left">
                <h1 class="p-3 ">معالم اخرى</h1>
                <div class="container photos">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="article.html" class="d-block photo-item">
                                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                                <div class="photo-text-more">
                                    <h3 class="heading">منارة لبدة</h3>
                                    <span class="meta">هنا شرح قصير وقنين عل المنارة بش يشبحه الكويس يخش يتفرج عل المعلومات الي احتمال كبير رجب لاعب فيهم تسعة</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="article.html" class="d-block photo-item">
                                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                                <div class="photo-text-more">
                                    <h3 class="heading">منارة لبدة</h3>
                                    <span class="meta">هنا شرح قصير وقنين عل المنارة بش يشبحه الكويس يخش يتفرج عل المعلومات الي احتمال كبير رجب لاعب فيهم تسعة</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

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
</body>
</html>
