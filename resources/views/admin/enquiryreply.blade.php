<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
    <script type="text/javascript">
            var img1 = document.getElementById('imgshow');
    function preview(){
     
     //console.log(event.target.files[0]);
     var imagePath = URL.createObjectURL(event.target.files[0]);
     //console.log(imagePath);
     img1.src=imagePath;

     img1.style.display='block';
     
    }

    addEventListener("load",function(){
        img1.style.display='block';
    });
        
    </script>

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
                                            <div class="login-wrap">
                                                <div class="login-content">

                                <div class="login-form">
                                    <form action="{{route('enquiryreplypost')}}" method="post" enctype="multipart/form-data" method="post">
                                            @csrf
                                        <div class="form-group">
                                            <input type="text" name="id" hidden value="{{$data->id}}">
                                            <label>Name</label>
                                            <input class="au-input au-input--full" type="text" name="name" readonly placeholder="{{$data->name}}">
                                            @if(Session::has('error_new'))
                                                <span class="text text-danger">{{Session::get('error_new')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>To</label>
                                            <input class="au-input au-input--full" type="email" name="email" readonly placeholder="{{$data->email}}" value="{{$data->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <input class="au-input au-input--full" type="email" name="text" readonly placeholder="{{$data->comment}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Reply</label>
                                            <textarea class="au-input au-input--full" type="text" name="reply" placeholder="type here..." rows="3"></textarea>
                                            @error('reply')
                                             <span class="text text-danger">{{$message}}</span>
                                            @enderror
                        
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Send</button>
                                    </form>
                                   
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
