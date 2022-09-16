<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
   @include('admin/common/head')
   <script>
    var cardinalscheck = function(){
        if(document.getElementById('username').value == '' && document.getElementById('email').value == '' && document.getElementById('password').value == ''){
            document.getElementById('msg1').innerHTML = '*Username field is required';
            document.getElementById('msg2').innerHTML = '*Email field is required';
            document.getElementById('msg3').innerHTML = '*Password field is required';
            return false;
        }
        return true;
    }
    var check = function(){
        if(document.getElementById('username').value == ''){
            document.getElementById('msg1').innerHTML = '*Username field is required';
        }else{
            document.getElementById('msg1').innerHTML = '';
        }
        if(document.getElementById('email').value == ''){
            document.getElementById('msg2').innerHTML = '*Email field is required';
        }else{
            document.getElementById('msg2').innerHTML = '';
        }
        if(document.getElementById('password').value == ''){
            document.getElementById('msg3').innerHTML = '*Password field is required';
        }else{
            document.getElementById('msg3').innerHTML = '';
        }
        return true;
    }




</script>
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
                        
                            
                        
                        <div class="login-form">
                            <form action="{{route('registerpost')}}" method="post" onsubmit="return cardinalscheck();">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" id="username" placeholder="Username" onkeyup="check();">
                                        <span class="text-danger" id="msg1">
                                            @error('username')
                                                {{$message}}
                                            @enderror
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" id="email" placeholder="Email"onkeyup="check();">
                                    <span class="text-danger" id="msg2">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" id="password" placeholder="Password"onkeyup="check();">
                                        <span class="text-danger" id="msg3">
                                            @error('password')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                <div class="register-link">
                                    <p>
                                        Already have account?
                                        <a href="{{route('login')}}">Sign In</a>
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