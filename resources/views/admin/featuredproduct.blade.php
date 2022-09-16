<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
   <script>
    function ConfirmDelete()
            {
            if(confirm("Are you sure you want to delete?")){
                return true;
            }else{
                window.location.reload();
            }
            }
</script>
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
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin/common/mobileheader') <!-- END HEADER MOBILE-->

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
                                                    <div class="pb-3">
                                                        <h3 align="center">Product Information</h3>
                                                   </div>
                                <div class="login-form">
                                        <table class="table table-sm table-hover table-bordered" id="myTable">
                                           
                                            <thead>
                                                <tr style="color: black" align="center">
                                                    <th>Title</th>
                                                    <th>Image</th>    
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
                                                 
                                                @foreach ($data as $item)
                                                    <tr align="center">
                                                        <td>{{$item->title}}</td>
                                                        <td><img src="{{asset('productimage/'.$item->image)}}" height="50px" width="50px"></td>
                                                        <td>
                                                              @if($item->status == 1)
                                                                <a href="{{(url('productchangeStatus/'.$item->id))}}"><label class="btn btn-success btn-sm">Active</label></a>
                                                              @else
                                                              <a href="{{(url('productchangeStatus/'.$item->id))}}"><label class="btn btn-danger btn-sm">Inactive</label></a>   
                                                              @endif
                                                        </td>
                                                        <td align="center"><a href="{{url('featuredproductinfo/'.$item->id)}}" style="color: rgb(90, 89, 89)"><i class="fa fa-info-circle" aria-hidden="true"></i>
                                                            </a>&nbsp &nbsp<a href="{{url('deletefeaturedproduct/'.$item->id)}}" style="color: rgb(90, 89, 89)" onclick="return ConfirmDelete()"><i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>&nbsp &nbsp<a href="{{url('updatefeaturedproduct/'.$item->id)}}" style="color: rgb(90, 89, 89)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        </td>
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
