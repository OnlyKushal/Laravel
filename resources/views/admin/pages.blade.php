<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head') 
   {{-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> --}}
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>  --}}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
<script src=//code.jquery.com/jquery-3.5.1.slim.min.js integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin=anonymous></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        

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
                                            @if (Session::has('msg'))
                                                <div class="alert alert-success"><center>{{Session::get('msg')}}</center></div>
                                            @endif
                                            {{-- <div class="login-wrap"> --}}
                                                <div class="login-content">

                                <div class="login-form">
                                    <label for=""class="btn btn-primary">
                                        <a href="{{route('createpages')}}" style="color: rgb(255, 255, 255)">Create Page  <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                    </label>
                                        <div align="center" class="pb-3">
                                            <h3>Mainpage details</h3>
                                        </div>
                                        <div class="form-group">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr align="center">
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mainpage as $item)
                                                            <tr align="center">
                                                                <td scope="row">{{$item->name}}</td>
                                                                <td>
                                                                   @if ($item->status == 1)
                                                                        
                                                                        <a href="{{route('pagestatus',$item->id)}}"><input class="btn btn-success small col-5"  id="status" data-toggle="tooltip" data-placement="top" title="Click to inactive" value="Active"/><a>
                                                                       
                                                                   @else
                                                                    
                                                                        <a href="{{route('pagestatus',$item->id)}}"><input class="btn btn-danger small col-5" id="status" data-toggle="tooltip" data-placement="top" title="Click to active" value ="inctive"/></a>
                                                                    
                                                                   @endif
                                            
    
                                                                </td>
                                                                <td>
                                                                    <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <a class="js-arrow" href="{{route('mainpageinfo',$item->id)}}" style="color: rgb(0, 45, 243)">
                                                                                <label class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="info">
                                                                                    <i class="fa fa-info-circle" aria-hidden="true" ></i>
                                                                                </label>
                                                                            </a>
                                                                        </div>
                                                                        &nbsp;
                                                                        <div class="col-2">
                                                                            <form method="POST" action="{{route('pagedelete')}}">
                                                                                @csrf
                                                                                <input name="id" type="hidden" value="{{$item->id}}">
                                                                                <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                            </form>
                                                                        </div>
                                                                        {{-- <a class="js-arrow" href="{{route('pagedelete',$item->id)}}" >
                                                                            <label class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Move to Trash">
                                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                                            </label>
                                                                        </a>  --}}
                                                                    </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        <div align="right">
                                            <label for=""class="btn btn-danger">
                                                <a href="{{route('pagestrash')}}" style="color: rgb(255, 255, 255)">Trash <i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <!-- Button trigger modal -->
  
     
   <!-- Modal -->

    </div>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
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



        //     Swal.fire({
        //     title: 'Are you sure?',
        //     text: "if you deleted this page show in trash!",
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Yes, delete it!,
        //  }).then((result) => {
        //     if (result.isConfirmed) {
        //          form.submit();
        //        }
        // })
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
