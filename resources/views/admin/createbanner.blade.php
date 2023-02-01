<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
    <script>
        var check = function() {
        if (document.getElementById('newpassword').value ==
            document.getElementById('confirmpassword').value) {
            document.getElementById('mg').style.color = 'green';
            document.getElementById('mg').innerHTML = 'Matching';
            if(document.getElementById('newpassword').value == "" &&
            document.getElementById('confirmpassword').value ==""){
                document.getElementById('mg').innerHTML = '';
                document.getElementById('mg1').innerHTML = '';
            }
            
        } else {
            document.getElementById('mg1').innerHTML = '';
            document.getElementById('mg').style.color = 'red';
            document.getElementById('mg').innerHTML = 'Not matching';
        }

    }
    var passwordcheck = function(){
        if(document.getElementById('newpassword').value != "" &&
            document.getElementById('confirmpassword').value !=""){
                if (document.getElementById('newpassword').value !=
                document.getElementById('confirmpassword').value) {
                    document.getElementById('mg').innerHTML = 'Please enter password properly';
                    return false;
                }
                return true;
            }else{
                document.getElementById('mg').style.color = 'red';
                document.getElementById('mg1').style.color = 'red';
                document.getElementById('mg1').innerHTML = '*New password field is required';
                document.getElementById('mg').innerHTML = '*confirm password field is required';
                return false;
            }
            return true;
    }
    </script>


</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{route('dashboard')}}">
                            <img src="{{asset('assets/admin/images/icon/logo.png')}}" alt="CoolAdmin" />
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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="page-wrapper"> --}}
                            <form action="{{route('createbannerpost')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="page-content--bge5">
                                    <div class="container">
                                        {{-- <div class="login-wrap"> --}}
                                            <div class="login-content">
                                                <div class="pb-3">
                                                    <h3 align="center">Create new banner</h3>
                                               </div>
                                                <div class="form-group">
                                                    @error('type')
                                                        <div class="alert alert-danger text text-danger">
                                                            <p class="text text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input class="au-input au-input--full" type="text" name="name" placeholder="name">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input class="au-input au-input--full" type="text" name="description" placeholder="descriptions">
                                                </div>

                                                @error('name')
                                                    <div class="alert alert-danger text text-danger">
                                                        <p class="text text-danger">{{$message}}</p>
                                                    </div>
                                                @enderror
                                                
                                                <div class="form-control mt-3">
                                                    <input type="file" name="image">
                                                </div>
                                        <div class="mt-3">
                                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">ADD</button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                
                            </div>
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
