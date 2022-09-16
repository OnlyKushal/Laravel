<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')

   {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   {{-- <SCRIPT type="text/javascript">
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
                        document.getElementById('msg2').innerHTML = "";
                    }
                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
                document.getElementById('msg2').innerHTML = "*Image field is required";
                document.getElementById("blah").style.visibility = "hidden";
                document.getElementById("blah").style.display = "none";
                fuData.value ='';
                fuData.files[0] = '';
            }
        }
    }
</SCRIPT> --}}


{{-- <style>#subpagediv{visibility: hidden; display: none}
        #subpagename{visibility: hidden; display: none}
</style> --}}

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#subpage').on('change', function(e) {
            var subpage_id = e.target.value;
            $.ajax({
                url: "{{ route('subpagesdescription') }}",
                type: "GET",
                data: {
                    subpage_id: subpage_id
                },
                success: function(data) {
                    $('#description').empty();
                    $('#description').append(data.description);
                }
            })
        });
    });
</script>
<script>
    var cardinalscheck = function(){
        if(document.getElementById('title').value == '' &&  document.getElementById('image').value == ''){
            document.getElementById('msg1').innerHTML = "*title field is required";
            document.getElementById('msg2').innerHTML = "*Image field is required";
            return false;
        }
        return true;
    }
    var check = function(){
        if(document.getElementById('title').value != ''){
            document.getElementById('msg1').innerHTML = "";
        }else{
            document.getElementById('msg1').innerHTML = "*title field is required";
        } 
        
    }
</script>
<style>
    * {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.image-box {
    position: relative;
    margin: auto;
    overflow: hidden;
}
.image-box img {
    max-width: 100%;
    transition: all 0.3s;
    display: block;
    width: 100%;
    height: auto;
    transform: scale(1);
}

.image-box:hover img {
    transform: scale(1.1);
}

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
                                <div class="page-wrapper">
                                    <div class="page-content--bge5">
                                        <div class="container">
                                            
                                        <div class="login-form">
                                            <div class="login-content">
                                                <h3 align="center">Subpage info</h3>
                                                    <div class="form-group" id="subpagediv">
                                                        <label for="">Sub menu</label>
                                                            <input type="text" name="pagename" id="pagename" value="{{$subpage->name}}"  class="au-input au-input--full" readonly>
                                                    </div>
                                                    @if ($image != null)
                                                    
                                                        
                                                            
                                                     
                                                    <div class="au-input au-input--full">
                                                        <div id="imagediv" name="imagediv" class="row p-1" align="center">
                                                        @foreach ($image as $item)
                                                        <div class="col-sm-4 form-control" align="center"><div class="image-box">
                                                            <img src="{{asset('pagesimage/'.$item)}}"height="200px" width="200px">
                                                        </div></div>
                                                        @endforeach 
                                                        </div>
                                                    </div>
                                                    @endif
                                                   
                                                    
                                                    <div>
                                                        <div class="pb-2">
                                                            <label>Description</label>
                                                                <textarea readonly class="au-input au-input--full" type="text" name="description" id="description" rows="3">{{$subpage->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    
                                                
                                            
                                        <div align="center"> 
                                            <a href="{{route('subpages')}}" style="color: white"><label class="au-btn au-btn--block au-btn--green m-b-20">Back</label></a>
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
