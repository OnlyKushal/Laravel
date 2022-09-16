<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')

   {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

<style> #subpagediv{visibility: hidden; display: none}
        #subpagename{visibility: hidden; display: none}
        #udiv{visibility: hidden; display: none}
</style>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mainpage').on('change', function(e) {
            var mainpage_id = e.target.value;
            $.ajax({
                url: "{{ route('subpagessend') }}",
                type: "GET",
                data: {
                    mainpage: mainpage_id
                },
                success: function(data) {
                    if (data.subpagedata == "") {
                        $('#subpagediv').css({
                                        display: "none",
                                        visibility: "hidden"
                                        });
                        $('#subpagename').css({
                                        display: "none",
                                        visibility: "hidden"
                                        });   
                                        
                        $('#imagediv').empty();
                        $('#dvPreview').empty();
                        $('#description').empty();
                        $('#pagenameerror').empty();
                        $('#description').append(data.mainpage.description)
                        if(data.image != null){
                                        $('#imagediv').empty();
                                        $('#img').css({"visibility": "visible","display": "grid"});
                                        $.each(data.image, function(key, value) {
                                            var pagesimage = "pagesimage/"+value;
                                                $('#imagediv').append('<div class="col-sm-4 form-control" align="center"><div class="image-box"><img src="{{asset('')}}'+pagesimage+'" hight="300px" width="300px"/></div><div style="background-color: green;"><input type="checkbox" name="imagekey[]" id="imagekey" value="'+key+'"></div></div>');
                                            });
                                    }else{
                                        $('#img').css({"visibility": "hidden","display": "none"});
                                        $('#imagediv').empty();
                                        $('#dvPreview').empty();
                                    }
                        
                    }else {
                        $('#subpagediv').css({
                                        display: "grid",
                                        visibility: "visible"
                                        });
                                        $('#img').css({"visibility": "hidden","display": "none"});
                        $('#imagediv').empty();
                        $('#dvPreview').empty();
                        $('#description').empty();
                        $('#pagenameerror').empty();
                        $('#subpage').empty();
                        $('#subpage').append('<option hidden value="">Choose Sub menu</option>');
                        $.each(data.subpagedata, function(key, value) {
                            $('#subpage').append('<option value="' + value.id + '">' + value.name + '</option>');                            
                        });
                        $('#subpage').on('change', function(e) {
                            $('#subpagename').css({
                                        display: "grid",
                                        visibility: "visible"
                                        });
                            var subpage_id = e.target.value;
                            $('#subpagenameerror').empty();
                            $.ajax({
                                url: "{{ route('subpagesdescription') }}",
                                type: "GET",
                                data: {
                                    subpage_id: subpage_id
                                },
                                success: function(data) {  
                                    $('#description').empty();
                                    $('#description').append(data.subpagesdescription.description);
                                        if(data.image != null){
                                        $('#imagediv').empty();
                                        $('#img').css({"visibility": "visible","display": "grid"});
                                        $.each(data.image, function(key, value) {
                                            var pagesimage = "pagesimage/"+value;
                                            $('#imagediv').append('<div class="col-sm-4 form-control" align="center"><div class="image-box"><img src="{{asset('')}}'+pagesimage+'" hight="300px" width="300px"/></div><div style="background-color: green;"><input type="checkbox" name="imagekey[]" id="imagekey" value="'+key+'"></div></div>');
                                            });
                                    }else{
                                        $('#img').css({"visibility": "hidden","display": "none"});
                                        $('#imagediv').empty();
                                        $('#dvPreview').empty();
                                    }
                                }
                            });
                        });
                    } 
                }
            })
        });
    });
</script>
<script>
    var cardinalscheck = function(){


        if(document.getElementById('mainpage').value == ""){
            document.getElementById('pagenameerror').innerHTML="*Menu field is required";
            return false;
        }
    }
</script>
        
<style>#img{visibility: hidden;display: none}</style>
<script language="javascript" type="text/javascript">
    window.onload = function () {
        var fileUpload = document.getElementById("updateimage");
        fileUpload.onchange = function () {
            if (typeof (FileReader) != "undefined") {
                $('#udiv').css({
                                display: "grid",
                                visibility: "visible"
                                    });
                var dvPreview = document.getElementById("dvPreview");
                dvPreview.innerHTML = "";
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                for (var i = 0; i < fileUpload.files.length; i++) {
                    var file = fileUpload.files[i];
                    if (regex.test(file.name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = document.createElement("IMG");
                            img.height = "150";
                            img.width = "150";
                            img.src = e.target.result;
                            img.style.border = "2px solid black";
                            img.style.margin = "5px 5px 5px 5px";
                            dvPreview.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    } else {
                        $('#udiv').css({
                                display: "none",
                                visibility: "hidden"
                                    });
                        alert(file.name + " is not a valid image file.");
                        dvPreview.innerHTML = "";
                        return false;
                    }
                }
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        }
    };
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
                                <div class="page-wrapper">
                                    <div class="page-content--bge5">
                                        <div class="container">
                                    
                                                <div class="login-content">
                                                    <div class="pb-3">
                                                        <h3 align="center">Edit menu</h3>
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
                                    <form action="{{route('pageeditpost')}}" method="post" enctype="multipart/form-data" method="post" onsubmit="return cardinalscheck();">
                                            @csrf
                                            <div class="form-group">
                                                <label>Select menu</label>
                                                <select name="mainpage" id="mainpage" class="form-control">
                                                    <option value="" hidden>Choose main menu</option>
                                                    @foreach ($mainpage as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <p id="pagenameerror" class="text text-danger"></p>
                                            </div>
                                            <div class="form-group" id="subpagediv">
                                                <label for="">Select Sub menu</label>
                                                    <select name="subpage" id="subpage" class="form-control">
                                                </select>
                                                <p id="subpagenameerror" class="text text-danger"></p>
                                               
                                            </div>
                                            <div>
                                                <div class="pb-2">
                                                    <label>New Menu name</label>
                                                        <input type="text" name="mainpagename" class="au-input au-input--full">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="pb-2" id="subpagename">
                                                    <label>New subpage name</label>
                                                    <input type="text" name="subpagename"  class="au-input au-input--full">
                                                </div>
                                            </div>
                                            <div>
                                                <div id="img">
                                                    <label>Select image</label>
                                                    <div class="au-input au-input--full">
                                                            <div id="imagediv" name="imagediv" class="row p-1">
                                                                
                                                            </div>
                                                    </div>
                                                        <input type="file" name="updateimage[]" multiple="multiple" hidden id="updateimage">
                                                    <div class="pt-2">
                                                        <div class="au-input au-input--full pb-2" id="udiv">
                                                            <div id="dvPreview" class="row ">
                                                            </div>
                                                        </div>
                                                        <p class="text text-danger" id="updateerror2"></p>
                                                        <div class="pt-2">
                                                          <label for="updateimage" class="btn btn-success col-sm-3 ">Update image <i class="fa fa-pencil-square" aria-hidden="true"></i></label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <p class="text text-danger" id="updateerror"></p>
                                                </div>
                                                <div class="pb-2">
                                                    <label>Description</label>
                                                        <textarea class="au-input au-input--full" type="text" name="description" id="description" rows="3"></textarea>
                                                </div>
                                                
                                            </div>
                                            
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Update</button>
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
