<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
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
            }
        }
    }
</SCRIPT>
<style>#blah{ visibility: hidden; display: none;}</style>
<script>

    var check = function(){

    }
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
                                            {{-- <div class="login-wrap"> --}}
                            <div class="login-content">
                                <div class="login-form">
                                    <form action="{{route('editbannerpost')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" value="{{$data->id}}" hidden>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="au-input au-input--full" type="text" name ="title" name ="title" placeholder="{{$data->title}}">
                                        <span class="text-danger">
                                            @error('title')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="image">
                                        <div align="center">
                                            <img src="images/noimg.jpg" id="blah" height="500px" width="500px" class="pb-2">
                                        </div>
                                        
                                        <label>Select New image</label><br>
                                        
                                        <input  type="file" name="updatedimage" id="image" onchange="return ValidateFileUpload()" class="pb-2">
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-5" type="submit" align="center">Update</button>
                                </form>
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
