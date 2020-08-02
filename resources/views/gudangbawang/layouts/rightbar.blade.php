<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/')}}" class="mobile-logo"><img src="{{asset('/managerproduksi/img/logo_gangsar.png')}}" class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <img src="{{asset('assets/images/svg-icon/horizontal.svg')}}" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                    <img src="{{asset('assets/images/svg-icon/verticle.svg')}}" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger navbar-toggle bg-transparent" href="javascript:void();" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="true">
                                    <img src="{{asset('assets/images/svg-icon/menu.svg')}}" class="img-fluid menu-hamburger-collapse" alt="menu">
                                    <img src="{{asset('assets/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                </a>
                             </div>
                        </li>                              
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Topbar -->
    <div class="topbar">
        <!-- Start container-fluid -->
        <div class="container-fluid">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center">
                    <div class="togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="logobar">
                                    <a href="{{url('/')}}" class="logo logo-large"><img src="{{asset('/managerproduksi/img/logo_gangsar.png')}}" class="img-fluid" alt="logo"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                      <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="live-icon">{{auth()->user()->nama}}</span><span class="feather icon-chevron-down live-icon"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <div class="dropdown-item">
                                                <div class="profilename">
                                                  <h5>{{auth()->user()->nama}}</h5>
                                                </div>
                                            </div>
                                            <div class="userbox">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media dropdown-item">
                                                        <a href="{{url('/change-password')}}" class="profile-icon mr-5"><img src="{{asset('assets/images/svg-icon/crm.svg')}}" class="img-fluid" alt="user">Change Password</a>
                                                    </li>                                                      
                                                    <li class="media dropdown-item">
                                                        <a href="{{ route('logout') }}" class="profile-icon"><img src="{{asset('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout">Logout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                   
                            </li>
                            <li class="list-inline-item menubar-toggle">
                                <div class="menubar">
                                    <a class="menu-hamburger navbar-toggle bg-transparent" href="javascript:void();" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="true">
                                        <img src="{{asset('assets/images/svg-icon/menu.svg')}}" class="img-fluid menu-hamburger-collapse" alt="menu">
                                        <img src="{{asset('assets/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                    </a>
                                 </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div> 
            <!-- End row -->
        </div>
        <!-- End container-fluid -->
    </div>
    <!-- End Topbar -->  
    <!-- Start Navigationbar -->
    <div class="navigationbar">
        <!-- Start container-fluid -->
        <div class="container-fluid">
            <!-- Start Horizontal Nav -->
            <nav class="horizontal-nav mobile-navbar fixed-navbar">
                <div class="collapse navbar-collapse" id="navbar-menu">
                  <ul class="horizontal-menu">
                    <li class="dropdown">
                        <a href="{{url('/gudang-bawang/home-bawang')}}"><img src="{{asset('assets/images/svg-icon/frontend.svg')}}" class="img-fluid">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/images/svg-icon/basic.svg')}}" class="img-fluid">Stock</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/gudang-bawang/stockbawangkulit')}}"><img src="{{asset('assets/images/svg-icon/forms.svg')}}" class="img-fluid">Bawang Kulit</a></li>
                            <li><a href="{{url('/gudang-bawang/stockbawangkupas')}}"><img src="{{asset('assets/images/svg-icon/forms.svg')}}" class="img-fluid">Bawang Kupas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/images/svg-icon/backend.svg')}}" class="img-fluid">Kerja Harian</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/gudang-bawang/tenaga-kupas')}}"><img src="{{asset('assets/images/svg-icon/customers.svg')}}" class="img-fluid">Tenaga Kupas</a></li>
                            <li><a href="{{url('/gudang-bawang/pembagian-bawang')}}"><img src="{{asset('assets/images/svg-icon/forms.svg')}}" class="img-fluid">Pembagian Bawang</a></li>
                            <li><a href="{{url('/gudang-bawang/penerimaan-bawang')}}"><img src="{{asset('assets/images/svg-icon/basic.svg')}}" class="img-fluid">Penerimaan Bawang</a></li>
                            <li><a href="{{url('/gudang-bawang/persiapan-masak-kanji')}}"><img src="{{asset('assets/images/svg-icon/icons.svg')}}" class="img-fluid">Persiapan Masak</a></li>
                        </ul>
                    </li>
                  </ul>
                </div>
            </nav>
            <!-- End Horizontal Nav -->
        </div>
        <!-- End container-fluid -->
    </div>
    <!-- End Navigationbar --> 
    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">© 2020 Gangsar - All Rights Reserved.</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>