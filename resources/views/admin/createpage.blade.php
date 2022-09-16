<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
    <script>
        var cardinalscheck =function(){
            if(document.getElementById('pagename').value == '')
            {
                document.getElementById('msg').innerHTML = '*Pagename field is required';
                return false;
            }
            return true;
        }
        
    }

    </script>

    <script>
        var check = function(){
            var input1 = document.getElementById('pagename');
            var input2 = document.getElementById('title');

            input1.addEventListener('change', function() {
                input2.value = input1.value;
            });
        }
        var cardinalscheck = function(){
            if(document.getElementById('pagename').value ==""){
                document.getElementById('error').innerHTML ="Menu name field is required";
                return false;
            }
            return true;
        }
    </script>

    <style> #commercialinteriorsub{visibility: hidden;display: none;}
     #residentialinteriorsub{visibility: hidden;display: none;}
     </style>


    
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
                                        @if (Session::has('msg'))
                                         <div class="alert alert-success pb-2">{{Session::get('msg')}}</div>
                                        @endif
                                        <div class="container">
                                            {{-- <div class="login-wrap"> --}}
                                                <div class="login-content">
                                                <div class="pb-3">
                                                     <h3 align="center">Create new page</h3>
                                                </div>
                                <div class="login-form">
                                    <form action="{{route('createpagespost')}}" method="post" enctype="multipart/form-data" onsubmit="return cardinalscheck();">
                                            @csrf

                                        <div class="form-group">
                                            <div class="pb-2">
                                            <label>Mainpage name</label>
                                            <input type="text" name="pagename" id="pagename" class="form-control au-input au-input--full" onkeyup="check();">
                                            <p class="text text-danger" id="error"></p>
                                            </div>
                                            
                                            <div class="pb-2">
                                                <label>Image</label>
                                                    <input type="file" name="image[]" id="image" multiple>
                                            </div>
                                            
                                            <div class="pb-2">
                                            <label>Description</label>
                                            <textarea class="au-input au-input--full" type="text" name="description" id="description" rows="3" placeholder="type here...." ></textarea>
                                            </div>
                                           
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">ADD</button>
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
