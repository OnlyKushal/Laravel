<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{route('dashboard')}}">
                    <p id="colorlib-logo">Footwear</p>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="active-has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('banner')}}">
                        <i class="fa fa-list-alt"></i>Banners
                    </a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('featuredproduct')}}">
                        <i class="fa fa-window-maximize"></i>Featured Product
                    </a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('enquiryshow')}}">
                        <i class="fa fa-envelope" aria-hidden="true"></i>Enquiry
                    </a>
                </li>
            </ul>
        </div> 
    </nav>
</header>