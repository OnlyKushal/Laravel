<header class="header">
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="{{asset('assets/images/logo.png')}}" alt="#"></a>
                    </div>
                    <div class="mobile-menu"></div>
                </div>
                <div class="col-lg-9 col-md-9 col-12 footer">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <span class="pr10 pt5"><img src="{{asset('assets/images/whatsapp-icon.svg')}}" width="32" alt=""> <a href="tel:9832044990" class="color-black font-18"><b>+91 98320 44990</b></a></span>
                        <ul class="social">
                           <li><a href="https://www.facebook.com/livingspacecreation" target="_blank" class="bg-fb"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/livingspacecreation/" target="_blank" class="bg-instg"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCXNK-I2ltcqykQK-64x3U6w" target="_blank" class="bg-youtube"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <!--/ End Header Widget -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
    <!-- Header Menu -->
    
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-12 p0">
                    <nav class="navbar navbar-default">
                        <div class="navbar-collapse">
                            <!-- Main Menu -->
                            <ul id="nav" class="nav menu navbar-nav">
                                <li><a href="{{route('index')}}">Home</a></li>
                               @foreach ($pages as $item)
                                @if ($item->status == 1)
                                                @if ($item->submenus == 0)
                                                <li><a href="{{route('defaultpage',$item->slug)}}">{{$item->name}}</a></li>
                                            @else
                                                <li><a href="#">{{$item->name}}<i class="fa fa-angle-down"></i></a> 
                                                    <ul class="dropdown">
                                                        @foreach ($subpage as $i)
                                                            @if ($i->mainpage == $item->id)
                                                                @if ($i->status == 1)
                                                                    <li><a href="{{route('defaultpage',$i->slug)}}">{{$i->name}}</a></li>     
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                @endif
                                @endforeach
                                    
                            </ul>
                            <!-- End Main Menu -->
                            <!-- button -->
                            <div class="button-1">
                                <a href="{{route('contact')}}">Contact Us</a>
                            </div>
                            <!--/ End Button -->
                        </div> 
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Menu -->
</header>