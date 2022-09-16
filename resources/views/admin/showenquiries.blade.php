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
                                    @if (Session::has('msg'))
                                    <div class="alert alert-success text text-success">
                                        <p class="text text-success">{{Session::get('msg')}}</p>
                                    </div>
                                    @endif

                                    <div class="page-content--bge5">
                                        <div class="container">
                                                <div class="login-content">
                                                    <div class="page-wrapper">
                                        <div class="login-form">
                                            <div align="right">
                                            <form action="{{route('enquiryshowsearch')}}" method="POST">
                                                @csrf             
                                            <div class="pb-2 row">
                                                <div class="col">
                                                    <div class="col-12-md">
                                                        <label>Status</label>
                                                        <select class="au-input form-select" name="status">
                                                            <option value = "0">Replied</option>
                                                            <option value = "1" selected >Pending</option>
                                                        </select>
                                                        <label for="">From</label>
                                                        <input type="date" name="fromdate" class="au-input">
                                                        
                                                        <label for="">To</label>
                                                        <input type="date" name="todate" class="au-input">
                                                    
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            <i class="fa fa-search" aria-hidden="true"></i></label>
                                                        </button>   
                                                    </div>
                                                    <div class="col-12-md"> @error('fromdate')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                    @error('todate')
                                                        <span class="text text-danger">{{$message}}</span>
                                                    @enderror</div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div  class="table-responsive">
                                    <table  class="table table-hover" >
                                            <thead>
                                                <tr style="color: black">
                                                    <th>Name</th>
                                                    <th>Email</th>    
                                                    <th>Mobile</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>{{$item->phnum}}</td>
                                                        <td>{{date('d-m-y',strtotime($item->created_at))}}</td>
                                                        <td>
                                                            @if ($item->status == 1)
                                                                <a href="{{url('enquiryreply/'.$item->id)}}"><label class="btn btn-outline-danger btn-sm">Pending</label></a>
                                                            @else
                                                                <a href="{{url('enquiryreplydetails/'.$item->id)}}"><label class="btn btn-outline-success btn-sm">Replied</label></a>
                                                            @endif
                                                            <a class="button" href="{{url('enquirydelete/'.$item->id)}}" class="text text-text-danger"><label onclick="return ConfirmDelete();" class="btn btn-outline-danger btn-sm">Delete</label></a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach  
                                               
                                            </tbody>
                                        </table>
                                        
                                       
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
   
    <!-- Jquery JS-->
    @include('admin/common/footer')

    
</body>

</html>

<!-- end document-->
