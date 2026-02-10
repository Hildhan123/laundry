<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>@yield('title','Laundry')</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('css/LineIcons.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('css/demo.css') }}">


</head>

<body>

<header class="header-area">
        <div class="navgition navgition-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="/images/logo.svg" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll" href="/">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="/tentang-kami">MENGAPA KAMI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="/pesan">PESAN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="/register">DAFTAR</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="/login">LOGIN</a>
                                    </li>
                                </ul>
                            </div>

                            

                            <div class="navbar-social d-none d-sm-flex align-items-center">
                                <span>FOLLOW US</span>
                                <ul>
                                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>                                  
                                </ul>
                               
                            </div>
                         
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(/image/carausel/1.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="header-content text-center">
                            <h3 class="header-title">JASA LAUNDRY ONLINE</h3>
                            <p class="text">Untuk Wilayah Malang dan Sekitarnya</p>
                            <ul class="header-btn">
                                @yield('search')
                            </ul>
                        </div> <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="/images/header-shape.svg" alt="shape">
            </div>
        </div> <!-- header content -->
    </header>

    
    <!--====== CONTACT PART ENDS ======-->
    <div class="container">
                @yield('content')           
    </div>                                  <!-- conteiner -->
    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-logo-support d-md-flex align-items-end justify-content-between">
                            <div class="footer-logo d-flex align-items-end">
                                <a class="mt-30" href="index.html"><img src="/images/logo.svg" alt="Logo"></a>

                                <ul class="social mt-30">
                                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div> <!-- footer logo -->
                            
                        </div> <!-- footer logo support -->
                    </div>
                </div> <!-- row -->
                <div class="row justify-content-between">
                    <div class="col-4">
                        <div class="footer-link">
                            <h6 class="footer-title">Tentang Kami</h6>
                            <br>
                           <p>Kami adalah layanan pemesanan laundry online dimana kami mewadahi penjual sebagai jasa laundry dan tamu sebagai pembeli</p>
                           <a href="/tentang-kami">Lihat Selengkapnya</a>
                        </div> <!-- footer link -->
                    </div>
                    <!--<div class="col-6 col-md-4">
                        <div class="footer-newsletter">
                            <h6 class="footer-title">Bingung diisi apa</h6>
                           <br>
                           <p> bla bla bla </p>
                        
                        </div> 
                    </div>-->
                    <div class="col-4">
                        <div class="footer-link">
                            <h6 class="footer-title">Bantuan</h6>
                            <ul>
                                <li><a href="/bantuan">Support Center</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Syarat dan Ketentuan</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text">Copyright 2021 <a rel="nofollow" href="/"></a> - Powered by <a el="nofollow" href="/">Tim PKM Universitas Negeri Malang</a></p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->









    <!--====== jquery js ======-->
    <script src="{{ asset('js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/scrolling-nav.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
