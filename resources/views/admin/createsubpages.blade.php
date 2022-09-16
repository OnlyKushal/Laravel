<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin/common/head')
    <script>
        var check = function(){
            var selectBox = document.getElementById("pagename");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            alert(selectedValue);
        }
        var cardinalscheck = function(){
            if(document.getElementById('subpage').value ==""){
                document.getElementById('error').innerHTML ="Subpage field is required";
                return false;
            }
            return true;
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
                                            @error('subpage')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                            @if (Session::has('msg'))
                                                <div class="alert alert-success">{{Session::get('msg')}}</div>
                                            @endif
                                            {{-- <div class="login-wrap"> --}}
                                                <div class="login-content">
                                                    <div class="pb-3">
                                                         <h3 align="center">Add Subpages</h3>
                                                    </div>
                                <div class="login-form">
                                    <form action="{{route('createsubpagepost')}}" method="post" enctype="multipart/form-data" onsubmit="return cardinalscheck();">
                                            @csrf
                                        <div class="form-group">
                                            <label>Page name</label>
                                            <select class="form-control au-input au-input--full" name="pageid" id="pageid">
                                                <option value ="" hidden>Choose mainpage</option>
                                                @foreach ($data as $item)
                                                    <option value = "{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="sub" class="pb-2">
                                            <label>Subpage name</label>
                                            <input type="text" name="subpage" class="form-control au-input au-input--full" id="subpage">
                                            <p class="text text-danger" id="error"></p>
                                        </div>

                                        <div class="pb-3">
                                            <div>
                                                <label>Image</label>
                                             </div>
                                             <div>
                                                <input type="file" name="image[]" id="image" multiple>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                                <textarea class="au-input au-input--full" type="text" name="description" id="description" rows="3" placeholder="type here...." ></textarea>
                                                <span class="text text-danger" id='msg'></span>
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
