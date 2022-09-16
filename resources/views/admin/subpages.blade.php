<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


   @include('admin/common/head')
    <script>
        <script type="text/javascript">
        $("#submit").click(function () {
            var name = $("#name").val();
            var marks = $("#marks").val();
            var str = "You Have Entered " 
                + "Name: " + name 
                + " and Marks: " + marks;
            $("#modal_body").html(str);
        });
    </script>
        //         $('#my_modal').on('click', function(e) {

        // //get data-id attribute of the clicked element
        // var bookId = $(e.relatedTarget).data('#subpageid');

        // //populate the textbox
        // $('#modal-id').value = bookId;
        // });
    </script>


     <!-- Import bootstrap cdn -->


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
                                                @if (Session::has('msg'))
                                                    <div class="alert alert-success"><center>{{Session::get('msg')}}</center></div>
                                                @endif
                                                <div class="login-content">

                                <div class="login-form">
                                    <label for=""class="btn btn-primary">
                                        <a href="{{route('createsubpages')}}" style="color: rgb(255, 255, 255)">Create Subpage  <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                    </label>
                                        <div align="center" class="pb-3">
                                            <h3>Subpage details</h3>
                                        </div>
                                        <div class="form-group">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr align="center">
                                                                <th scope="col">Subpage name</th>
                                                                <th scope="col">Mainpage name</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($subpage as $item)
                                                            @if (mainpagedata($item->mainpage)!= "")
                                                                <tr align="center">
                                                                    <td scope="row">
                                                                        <label id="subpageid" value="{{$item->id}}" hidden></label>
                                                                        {{$item->name}}
                                                                    </td>
                                                                    <td>{{mainpagedata($item->mainpage)}}</td>

                                                                    <td >
                                                                        @if ($item->status == 1)
                                                                            
                                                                            <a href="{{route('subpagestatus',$item->id)}}"><input class="btn btn-success small col-5"  id="status" data-toggle="tooltip" data-placement="top" title="Click to inactive" value="Active"/><a>
                                                                    
                                                                        @else
                                                                    
                                                                            <a href="{{route('subpagestatus',$item->id)}}"><input class="btn btn-danger small col-5" id="status" data-toggle="tooltip" data-placement="top" title="Click to active" value ="inctive"/></a>
                                                                    
                                                                        @endif
                                                                
                                                                    </td>
                                                                    <td>
                                                                        <div class="container-fluid">
                                                                        <div class="row" >
                                                                            <div class="col-3">
                                                                                <a class="js-arrow" href="{{route('subpagesinfo',$item->id)}}" style="color: rgb(0, 45, 243)" data-toggle="tooltip" data-placement="top" title="info">
                                                                                    <label class="btn btn-outline-primary">
                                                                                        <i class="fa fa-info-circle" aria-hidden="true" ></i>
                                                                                    </label>
                                                                                </a>
                                                                            </div>
                                                                        &nbsp;
                                                                        <div class="col-3">
                                                                            <form method="POST" action="{{route('subpagedeletesub')}}">
                                                                                @csrf
                                                                                <input name="id" type="hidden" value="{{$item->id}}">
                                                                                <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                            </form>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div align="right">
                                                <label for=""class="btn btn-danger">
                                                    <a href="{{route('subpagestrash')}}" style="color: rgb(255, 255, 255)">Trash <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </label> 
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
        <!-- Modal -->
        {{-- <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" 
                        id="exampleModalLabel">
                        Confirmation
                    </h5>
                      
                    <button type="button" 
                        class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div> --}}

    </div>
    <script type="text/javascript">
       
       $('.show_confirm').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
                        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                 form.submit();
            }
            })
        });
     
       </script>
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
