<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @if((admindata(session()->get('ADMIN_ID'))->image) == null)
                                    <img src="{{asset('assets/admin/images/icon/defult_image.png')}}" alt="" />
                                @else
                                    <img src="{{asset('adminimage/'.admindata(session()->get('ADMIN_ID'))->image)}}" alt="" />
                                @endif
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{admindata(session()->get('ADMIN_ID'))->username}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                        @if(admindata(session()->get('ADMIN_ID'))->image == null)
                                            <img src="{{asset('assets/admin/images/icon/defult_image.png')}}" alt="" />
                                        @else
                                            <img src="{{asset('adminimage/'.admindata(session()->get('ADMIN_ID'))->image)}}" alt="" />
                                        @endif
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            {{admindata(session()->get('ADMIN_ID'))->username}}
                                        </h5>
                                        <span class="email">{{admindata(session()->get('ADMIN_ID'))->email}}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{route('update')}}">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{route('password')}}">
                                            <i class="fa fa-key"></i>Password</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{route('logout')}}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</header>