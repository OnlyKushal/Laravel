<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="SITE KEYWORDS HERE" />
        <meta name="description" content="">
        <meta name='copyright' content=''>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Title -->
        <title>Living Space</title>
        <!-- Favicon -->
 
         <link rel="icon" type="image/png" href="https://livingspacecreation.com/images/32-X-32.png"/>
        <!-- Web Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <!-- Fancy Box CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
        <!-- Slick Nav CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">

        <!-- Learedu Stylesheet -->
        <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css?v=0.3')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <link href="{{asset('assets/fonts/fontawesome-web/css/all.css?v0.3')}}" rel="stylesheet">

        <!-- Learedu Color -->
        <link rel="stylesheet" href="{{asset('assets/css/color/color6.css')}}">
        <!--<link rel="stylesheet" href="css/color/color2.css">-->
        <!--<link rel="stylesheet" href="css/color/color3.css">-->
        <!--<link rel="stylesheet" href="css/color/color4.css">-->
        <!--<link rel="stylesheet" href="css/color/color5.css">-->
        <!--<link rel="stylesheet" href="css/color/color6.css">-->
        <!--<link rel="stylesheet" href="css/color/color7.css">-->
        <!--<link rel="stylesheet" href="css/color/color8.css">-->
    </head>
    <body>

        <!-- Book Preloader -->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
        <!--/ End Book Preloader -->
        <!-- Header -->
    @include('common/menu')
        <!-- End Header -->

        <!-- Slider Area -->
        <section class="home-slider">
            <div class="slider-active">
                
                <!-- Single Slider -->
                @foreach ($data as $item)
                        <div class="single-slider overlay" style="background-image:url('{{asset('bannerimages/'.$item->image)}}')" data-stellar-background-ratio="0.5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-4 col-md-8 offset-md-4 col-12">
                                        <div class="slider-text text-right">
                                            <h1>{{$item->title}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
                
        </section>
        <!--/ End Slider Area -->
        <!-- Events -->
        <section class="events section pt0 widget-style-1 pb30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="event-slider">
                    <!-- Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta"> 
                                <i class="fas fa-clipboard-list font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">First Visit</h4>
                            <p class="font-13">During the first visit, our personnel who will be your personal designer take accurate measurements.. <a href="#">more</a></p>
                        </div>
                    </div>
                    <!--/ End Single Event -->
                    <!-- Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta"> 
                                <i class="fas fa-chalkboard-teacher font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">Understand</h4>
                            <p class="font-13">We are keen to understand and interpret your individual needs. Our expert designers will take.. <a href="#">more</a></p>
                        </div>
                    </div>
                    <!--/ End Single Event -->
                    <!-- Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta"> 
                                <i class="fas fa-shipping-fast font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">Fast Paced</h4>
                            <p class="font-13">In this modern, fast paced world we realize the importance of your time. That's why we are.. <a href="#">more</a></p>
                        </div>
                    </div>
                    <!--/ End Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta"> 
                                <i class="fas fa-handshake font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">Perfection</h4>
                            <p class="font-13">We can proudly say that no one can match our installation experts in terns of perfection and speed.. <a href="#">more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="our-features section widget-style-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="widget-box">
                    <img src="{{asset('assets/images/small-banner1.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>




<section class="events section widget-style-4">
    <div class="widget-style-5">
        <div class="container">
            <div class="row">
                <div class="col-12 font-30 text-center mb20 color-white">Featured Products</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="event-slider">
                        <!-- Single Event -->
                        @foreach ($data2 as $item2)
                            
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img" ><img src="{{asset('productimage/'.$item2->image)}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">{{$item2->title}}</a></div>
                            </div>
                        </div>
                        <!--/ End Single Event -->
                        <!-- Single Event -->
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




<section class="our-features section widget-style-6">
    <div class="container">
        <div class="row">
            <div class="col-12 font-30 text-center mb20 wow zoomIn">
                Why Us
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon1.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title">Creativity & In House Design</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon2.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">3D Modelling</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon3.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Wide Range</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon4.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Space Utilisation</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon5.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Experience and Efficiency</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon6.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Hassles Free</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon7.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Time line of delidery</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon8.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Budget and Reasonable pricing</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon9.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">After Sales Service</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

       
    <form action="{{route('enquiry')}}" method="POST">
        @csrf
        @include('common\enquiryform')
    </form>

<!-- Footer -->
        <footer class="footer overlay section widget-style-8">
            <!-- Footer Top -->
            <div class="footer-top pt20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- About -->
                            <div class="single-widget about">
                                <div class="logo mb20"><a href="#"><img src="{{asset('assets/images/logo2.png')}}" alt="#"></a></div>
                                <ul class="social text-left mb20">
                                     <li><a href="https://www.facebook.com/livingspacecreation" target="_blank" class="bg-fb"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/livingspacecreation/" target="_blank" class="bg-instg"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCXNK-I2ltcqykQK-64x3U6w" target="_blank" class="bg-youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Useful Links -->
                            <div class="single-widget useful-links">
                                <h2>Address</h2>
                                <p class="mb0"><b>Kolkata:</b></p>
                                <p class="lineheight16">225, Block A, Laketown Near Swimming Pool, Kolkata - 700089</p>
                                <p class="mb0"><b>Siliguri:</b></p>
                                <p class="lineheight16">96, Nazrul Sarani, Ashrampara, Siliguri - 734001</p>
<p><i class="fas fa-envelope"></i> <a href="mailto:livingspacekolkata@gmail.com">livingspacekolkata@gmail.com</a></p>
<p><i class="fas fa-mobile-alt"></i> +91 98320 44990/ +91 89448 88717</p>
                            </div>
                            <!--/ End Useful Links -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Latest News -->
                            <div class="single-widget latest-news">
                                <h2>Our Services</h2>
                                <ul>
                                    <li class="color-white"><b>Residential Interior</b></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="{{route('livingroom')}}">Living Room</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="{{route('diningroom')}}">Dining Room</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="{{route('bedroom')}}">Bed Room</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="{{route('kitchen')}}">Kitchen</a></li>
                                    <li class="color-white"><b>Commercial Interior</b></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="{{route('showroominterior')}}">Showroom Interior</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="{{route('hotelrestaurant')}}">Hotel & Restaurant Interior</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="{{route('corporateoffice')}}">Corporate Office Interior</a></li>
                                </ul>
                            </div>
                            <!--/ End Latest News -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Newsletter -->
                            <div class="single-widget newsletter">
                                <h2>Services we offer</h2>
                                <ul>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="#">First Visit</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="#">Understand</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="#">Fast Paced</a></li>
                                    <li><i class="fas fa-angle-right mr10 color-white"></i><a href="#">Perfection</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Footer Top -->
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bottom-head">
                                <div class="row">
                                    <div class="col-12 footer-link3 text-center">
                                        <a href="{{route('index')}}">Home</a>
                                        <a href="{{route('aboutus')}}">About Us</a>
                                        <a href="{{route('termsconditions')}}">Terms & Conditions</a>
                                        <a href="{{route('contact')}}">Contact Us</a>
                                    </div>
                                    <div class="col-12">
                                        <!-- Copyright -->
                                        <div class="text-center mt0">
                                            <p>© Copyright 2021 www.livingspacecreation.com. All Rights Reserved</p>
                                        </div>
                                        <!--/ End Copyright -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Footer Bottom -->
        </footer>
        <!--/ End Footer -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J695EKLB7F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J695EKLB7F');
</script>
        <!-- Jquery JS-->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-migrate.min.js')}}"></script>
        <!-- Popper JS-->
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <!-- Bootstrap JS-->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Jquery Steller JS -->
        <script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
        <!-- Particle JS -->
        <script src="{{asset('assets/js/particles.min.js')}}"></script>
        <!-- Fancy Box JS-->
        <script src="{{asset('assets/js/facnybox.min.js')}}"></script>
        <!-- Magnific Popup JS-->
        <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Masonry JS-->
        <script src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
        <!-- Circle Progress JS -->
        <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
        <!-- Owl Carousel JS-->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- Waypoints JS-->
        <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
        <!-- Slick Nav JS-->
        <script src="{{asset('assets/js/slicknav.min.js')}}"></script>
        <!-- Counter Up JS -->
        <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
        <!-- Easing JS-->
        <script src="{{asset('assets/js/easing.min.js')}}"></script>
        <!-- Wow Min JS-->
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <!-- Scroll Up JS-->
        <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
        <!-- Google Maps JS -->
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyC0RqLa90WDfoJedoE3Z_Gy7a7o8PCL2jw"></script>
        <script src="{{asset('assets/js/gmaps.min.js')}}"></script>
        <!-- Main JS-->
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>