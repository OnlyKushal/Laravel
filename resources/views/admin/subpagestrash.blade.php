<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head') 
   {{-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> --}}
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>  --}}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin/common/mobileheader')
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
                                    <div class="page-content--bge5">
                                        <div class="container">
                                            @if (Session::has('msg'))
                                                <div class="alert alert-success"><center>{{Session::get('msg')}}</center></div>
                                            @endif
                                            {{-- <div class="login-wrap"> --}}
                                                <div class="login-content">

                                <div class="login-form">
                                    
                                        <div align="center" class="pb-3">
                                            <h3>Trash details</h3>
                                        </div>
                                        <div class="form-group">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr align="center">
                                                                <th scope="col">Page Name</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($page as $item)
                                                                    @foreach ($mainpage as $i)
                                                                        @if ($i->id == $item->mainpage)
                                                                                <tr align="center">
                                                                                    <td scope="row">{{$item->name}}</td>
                                                                                    <td> 
                                                                                        <a class="js-arrow" href="{{route('subpagestrashrestore',$item->id)}}" style="color: rgb(0, 45, 243)">
                                                                                            <label class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Restore">
                                                                                                <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                            </label>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                        @endif
                                                                    @endforeach
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                            </div>
                        </div>
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
