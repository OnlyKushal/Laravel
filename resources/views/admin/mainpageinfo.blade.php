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
                    $('#imagediv').empty();
                    $('#description').append(data.subpagesdescription.description);
                    if(data.image != null){
                        $('#img').css({"visibility": "visible","display": "grid"});
                        $('#imagediv').empty();
                        $.each(data.image, function(key, value) {
                            var pagesimage = "pagesimage/"+value;
                                $('#imagediv').append('<div class="col-sm-4 form-control" align="center"><div class="image-box"><img src="{{asset('')}}'+pagesimage+'" hight="300px" width="300px"/></div></div>');
                            });
                    }else{
                        $('#img').css({"visibility": "hidden","display": "none"});
                        $('#imagediv').empty();
                    }
                }
            })
        });
    });

</script>
<style>#img{visibility: hidden;display: none}</style>
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
                                    
                                                <div class="login-content">
                                                    <div class="pb-3">
                                                        <h3 align="center">Mainpage info</h3>
                                                   </div>
                                                   @if (Session::has('msg'))
                                                    <div class="alert alert-success">{{session::get('msg')}}</div>
                                                   @endif
                                                   <span class="text-danger" id="msg1">
                                                    @error('mainpagename')
                                                        {{$message}}
                                                    @enderror
                                                    @error('subpagename')
                                                        {{$message}}
                                                    @enderror
                                                    </span>
                                <div class="login-form">
                                    <form action="" method="post" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Main menu</label>
                                                    <input type="text" value="{{$mainpage->name}}" id="mainpage" readonly>
                                                </div>
                                                @if($mainpage->submenus == 0)
                                                    @if ($image)
                                                        <label for="">Images</label>
                                                        <div class="au-input au-input--full">
                                                            <div id="imagediv" name="imagediv" class="row p-1">
                                                            @foreach (explode(',',$image->image)  as $item)
                                                                
                                                                    <div class="col-sm-4 form-control" align="center">
                                                                        <div class="image-box">
                                                                            <img src="{{asset('pagesimage/'.$item)}}" alt="" hight="300px" width="300px">
                                                                        </div>
                                                                    </div>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    @endif
                                                    
                                                    <div>
                                                        <div class="pb-2 pt-2">
                                                            <label>Description</label>
                                                                <textarea class="au-input au-input--full" type="text" name="description" id="description" rows="3">{{$mainpage->description}}</textarea>
                                                        </div>
                                                    </div>
                                                     
                                                    
                                                @else
                                                    <div class="form-group" id="subpagediv">
                                                        <label for="">Select Sub menu</label>
                                                            <select name="subpage" id="subpage" class="form-control">
                                                                <option value="" hidden>Coose submenu</option>
                                                                @foreach ($subpage as $item)
                                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div id="img" class="pb-3">
                                                        <label for="">Images</label>
                                                        <div class="au-input au-input--full">
                                                            <div id="imagediv" name="imagediv" class="row p-1">
                                                                
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div>
                                                        <div class="pb-2">
                                                            <label>Description</label>
                                                                <textarea class="au-input au-input--full" type="text" readonly name="description" id="description" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                @endif
                                            
                                           <div align="center"> 
                                            <a href="{{route('mainpages')}}" style="color: white"><label class="au-btn au-btn--block au-btn--green m-b-20">Back</label></a>
                                            </div>
                                    </form>
                                   
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
