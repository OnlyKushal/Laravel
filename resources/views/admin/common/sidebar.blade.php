<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('assets/admin/images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    
    <div class="menu-sidebar__content js-scrollbar1">
        
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list" >
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('dashboard')}}"  style="color: rgb(77, 77, 77)">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="active has-sub">
                    {{-- <a class="js-arrow" href="{{route('banner')}}"  style="color: rgb(77, 77, 77)">
                        <i class="fa fa-list-alt"></i>Banners
                    </a> --}}
                    <a class="js-arrow" href="#" style="color: rgb(77, 77, 77)">
                        <i class="fa fa-list-alt"  ></i>Banner</a>
                         <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{route('banner')}}"  style="color: rgb(77, 77, 77)">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>Info
                                </a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{route('createbanner')}}"  style="color: rgb(77, 77, 77)">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>Add Banner
                                </a>
                            </li>
                            
                        </ul>
                        
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="#" style="color: rgb(77, 77, 77)">
                        <i class="fa fa-window-maximize"></i>Featured Product</a>
                         <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{route('featuredproduct')}}"  style="color: rgb(77, 77, 77)">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>Info
                                </a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{route('createfeaturedproduct')}}"  style="color: rgb(77, 77, 77)">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>Add Product
                                </a>
                            </li>
                        </ul>

                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('enquiryshow')}}"  style="color: rgb(77, 77, 77)">
                        <i class="fa fa-envelope" aria-hidden="true"></i>Enquiry
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-columns"></i>Pages</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{route('mainpages')}}" style="color: rgb(77, 77, 77)">
                                    <i class="fa fa-bars" aria-hidden="true"></i>Main menus</a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{route('subpages')}}" style="color: rgb(77, 77, 77)">
                                    <i class="fa fa-bars" aria-hidden="true"></i>Sub menus</a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="{{route('pageedit')}}" style="color: rgb(77, 77, 77)">
                                    <i class="fa fa-th-list" aria-hidden="true"></i>Edit Pages</a>
                            </li>
                           
                    </ul>
                </li>
                <li class="active has-sub">
                        <a class="js-arrow" href="{{route('communications')}}" style="color: rgb(77, 77, 77)">
                        <i class="fa fa-commenting" aria-hidden="true"></i>Communications
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>