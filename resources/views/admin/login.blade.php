<!DOCTYPE html>
<html lang="en">
<script>
    var cardinalscheck = function(){
        if(document.getElementById('email').value == "" && document.getElementById('password').value== ""){
            document.getElementById('msg1').innerHTML="*Email field is required";
            document.getElementById('msg2').innerHTML="*Password field is required"; 
            return false;
        }
        return true;
    }
    var check = function(){
        if(document.getElementById('email').value != "" ){
            document.getElementById('msg1').innerHTML = '';        
        }else{
            document.getElementById('msg1').innerHTML="*Email field is required";
        }
        
        if(document.getElementById('password').value != ""){
            document.getElementById('msg2').innerHTML = ''; 
        }else{
            document.getElementById('msg2').innerHTML="*Password field is required"; 
        }
        
        return true;
    }

</script>
<head>
    @include('admin/common/head')
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="{{route('login')}}">
                                <img src="{{asset('assets/admin/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        @if(Session::has('msg'))
                        <div class="alert alert-success" align="center">
                            <p>{{Session::get('msg')}}</p>
                        </div>
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger" align="center">
                            <p>{{Session::get('error')}}</p>
                        </div>
                        @endif

                        <div class="login-form">
                            <form action="{{route('loginpost')}}" method="post" onsubmit="return cardinalscheck();">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" id="email" value="{{old('email')}}" placeholder="Email" onkeyup='check();'>
                                    <span class="text text-danger" id="msg1">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password" value="{{old('password')}}" name="password" placeholder="Password" onkeyup='check();'>
                                    <span class="text text-danger" id="msg2">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            
                                <div class="register-link">
                                    <p>
                                        Don't you have account?
                                        <a href="{{route('registerget')}}">Sign Up Here</a>
                                    </p>
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

    <!-- Jquery JS-->
        
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