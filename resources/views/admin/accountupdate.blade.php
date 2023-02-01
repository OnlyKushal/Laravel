<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
   <style>
    .userimage{
        border-radius: 50%;
        height:200px;
        width:200px;
    }
    .image{
        border-radius: 50%;
        height:200px;
        width:200px;
    }
</style>
<SCRIPT type="text/javascript">
    function ValidateFileUpload() {
        var fuData = document.getElementById('image');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {
                        document.getElementById("userimage").style.visibility = "hidden";
                        document.getElementById("userimage").style.display = "none";                            

// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                        document.getElementById("blah").style.visibility = "visible";
                        document.getElementById("blah").style.display = "grid";
                    }
                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
                document.getElementById("blah").style.visibility = "hidden";
                document.getElementById("blah").style.display = "none";
                fuData.value ='';
                fuData.files[0] = '';
                document.getElementById("userimage").style.visibility = "visible";
                document.getElementById("userimage").style.display = "grid";   
            }
        }
    }
</SCRIPT>
<style>#blah{ visibility: hidden; display: none;}</style>
<style>#userimage{ visibility: visible; display: grid;}</style>


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
                                    <div class="page-content--bge5">
                                        <div class="container">
                                            {{-- <div class="login-wrap"> --}}
                                                <div class="login-content">

                                <div class="login-form">
                                    <form action="{{route('adminupdatepost')}}" method="post" enctype="multipart/form-data" method="post" onsubmit="return passwordcheck()">
                                            @csrf
                                        <div class="form-group">
                                            <div class="pb-3" align="center">
                                                @if(admindata(session()->get('ADMIN_ID'))->image == null)
                                            <img src="{{asset('assets/admin/images/icon/defult_image.png')}}" alt="" height="150px" width="150px" class="userimage" id="userimage"/>
                                        @else
                                        <img src="{{asset('adminimage/'.admindata(session()->get('ADMIN_ID'))->image)}}" alt="" height="150px" width="150px" class="userimage" id="userimage">
                                        @endif
                                        <img src="images/noimg.jpg" id="blah" class="image">
                                    </div>
                                    <div class="form-group" align="center">
                                        <div class="col-2">
                                         <label for="image" class="btn btn-success">Upload</label>
                                        <input type="file" name="admin_image" id="image" hidden onchange="return ValidateFileUpload()"> 
                                    </div>
                                    </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Name</label>
                                        <input class="au-input au-input--full mb-3" type="text" name="name" id ="name">
                                        <span id="mg1"></span>
                                        @error('name')
                                            <span class="text text-danger mb-2">{{$message}}</span>
                                        @enderror
                                    </div>
            
                                    
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" class="update" id="update">Update</button>
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
