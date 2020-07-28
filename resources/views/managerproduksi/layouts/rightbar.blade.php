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
                                    <a href="{{url('/manager-produksi')}}" class="logo logo-large"><img src="{{asset('/managerproduksi/img/logo_gangsar.png')}}" class="img-fluid" alt="logo"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                      <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="live-icon">{{ App\Models\Pegawai::where('id_jabatan', 3)->value('nama') }}</span><span class="feather icon-chevron-down live-icon"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <div class="dropdown-item">
                                                <div class="profilename">
                                                  <h5>{{ App\Models\Pegawai::where('id_jabatan', 3)->value('nama') }}</h5>
                                                </div>
                                            </div>
                                            <div class="userbox">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media dropdown-item">
                                                        <a href="{{ url('/change-password') }}" class="profile-icon">
                                                            <img src="{{ asset('/assets/images/svg-icon/authentication.svg') }}" class="img-fluid" alt="logout">
                                                            Change Password
                                                        </a>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <a href="{{ url('/logout') }}" class="profile-icon">
                                                            <img src="{{ asset('/assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout">
                                                            Logout
                                                        </a>
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
                    <li class="menu-dashboard">
                        <a href="{{ url('/manager-produksi') }}"><img src="{{asset('assets/images/svg-icon/frontend.svg')}}" class="img-fluid" alt="CRM"><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ url('/penerimaan/history_penerimaan') }}" ><img src="{{asset('assets/images/svg-icon/ecommerce.svg')}}" class="img-fluid" alt="ecommerce"><span>Penerimaan Barang</span></a>
                    </li>

                    <li class="dropdown">
                         <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/images/svg-icon/tables.svg')}}" class="img-fluid" alt="ui-kits"><span>Data Produksi</span></a>
                        <ul class="dropdown-menu">
                             <li class="dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/images/svg-icon/tables.svg')}}" class="img-fluid" alt="tables">Gudang Kacang & Gudang Kacang Sortir</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/manpro-kacang/home') }}">Home</a></li>
                                    <li class="dropdown">
                                        <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown">Stock</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('/manpro-kacang/stock/gk')}}">Gudang Kacang</a></li>
                                            <li><a href="{{url('/manpro-kacang/stock/gks')}}">Gudang Kacang Sortir</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown">Kerja Harian</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('/manpro-kacang/kerjaharian/hariini')}}">Hari Ini</a></li>
                                            <li><a href="{{url('/manpro-kacang/kerjaharian/sebelumnya')}}">Sebelumnya</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/images/svg-icon/tables.svg')}}" class="img-fluid" alt="tables">Gudang Bawang</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('/manpro-bawang/home')}}">Home</a></li>
                                    <li class="dropdown">
                                        <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown">Stock</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('/manpro-bawang/stock/bawangkulit')}}">Bawang Kulit</a></li>
                                            <li><a href="{{url('/manpro-bawang/stock/bawangkupas')}}">Bawang Kupas</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown">Kerja Harian</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('/manpro-bawang/kerjaharian/tenagakupas')}}">Tenaga Kupas</a></li>
                                            <li><a href="{{url('/manpro-bawang/kerjaharian/pembagianbawang')}}">Pembagian Bawang</a></li>
                                            <li><a href="{{url('/manpro-bawang/kerjaharian/penerimaanbawang')}}">Penerimaan Bawang</a></li>
                                            <li><a href="{{url('/manpro-bawang/kerjaharian/persiapanmasak')}}">Persiapan Masak Kanji</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('/assets/images/svg-icon/tables.svg') }}" class="img-fluid"
                                        alt="dashboard">Gudang Bumbu
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/manager-produksi/gudang-bumbu') }}">Home</a></li>
                                    <li><a href="{{ url('/manager-produksi/gudang-bumbu/stock') }}">Stock</a></li>
                                    <li><a href="{{ url('/manager-produksi/gudang-bumbu/kerja-harian') }}">Kerja Harian</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('/assets/images/svg-icon/tables.svg') }}" class="img-fluid"
                                        alt="dashboard">Gudang Tapioka
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/manager-produksi/gudang-tapioka') }}">Home</a></li>
                                    <li><a href="{{ url('/manager-produksi/gudang-tapioka/stock') }}">Stock</a></li>
                                    <li><a href="{{ url('/manager-produksi/gudang-tapioka/kerja-harian') }}">Kerja
                                            Harian</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-order-masak">
                        <a href="{{ url('/manager-produksi/order-masak') }}">
                            <img src="{{ asset('/assets/images/svg-icon/basic.svg') }}" class="img-fluid" alt="hospital">
                            <span>Order Masak</span>
                        </a>
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