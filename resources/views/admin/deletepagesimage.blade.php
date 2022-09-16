<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
   
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
                                    @if (Session::has('msg'))
                                    <div class="alert alert-success text text-success">
                                        <p class="text text-success">{{Session::get('msg')}}</p>
                                    </div>
                                    @endif

                                    <div class="page-content--bge5">
                                        <div class="container">
                                                <div class="login-content">

                                <div class="login-form">
                                       <h3 align='center' class="pb-3">Image Information</h3>
                                        <table class="table table-sm table-bordered table-hover" id="myTable">
                                           
                                            <thead>
                                                <tr>
                                                    <th>Page name</th>
                                                    <th>Delete</th> 
                                                </tr> 
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($image as $item)
                                                    <tr>
                                                        <td>{{$item->pagename}}</td>
                                                        <td><a href="{{route('deletepagesimageget',$item->pagename)}}" style="color: rgb(192, 17, 17)">
                                                            <i class="fa fa-minus-circle" aria-hidden="true"></i></td></a>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        
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
