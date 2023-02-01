<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/common/head')
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{route('dashboard')}}">
                            <h2 id="colorlib-logo">Footwear</h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                    </ul>
                </div> 
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('admin/common/sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('admin/common/header')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            
            <div class="main-content">
                <section class="statistic statistic2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--green">
                                    <h2 class="number"></h2>
                                    <span class="desc">catagories</span>
                                    <div class="icon">
                                        <i class="fa fa-window-maximize"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange">
                                    <h2 class="number"></h2>
                                    <span class="desc">Product</span>
                                    <div class="icon">
                                        <i class="fa fa-window-maximize"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                   <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    @if (session()->has('msg'))
                                        <div class="alert alert-success text text-success">
                                            <p class="text text-success">{{session()->get('msg')}}</p>
                                        </div>
                                    @endif
                                    <p>Copyright © 2022 Brainium. All rights reserved. Template by<a href="https://www.brainiuminfotech.com">Brainium</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('assets/admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('assets/admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('assets/admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('assets/admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('assets/admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('assets/admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('assets/admin/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
