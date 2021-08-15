<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/sumedang.png')}}">

    @yield('css')
    
    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    @auth
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            @php
                                if(Auth::user()->photo){
                                    $pathImg = Storage::url($item->photo);
                                }else{
                                    $pathImg = asset('assets/images/avatar.png');
                                }
                            @endphp
                            <img src="{{$pathImg}}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="text-overflow m-0">Selamat Datang !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{route('pengguna.edit',Auth::user()->id)}}" class="dropdown-item notify-item">
                                <i class="fe-user"></i> <span>Setting</span>
                            </a>

                            <!-- item-->
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                    @endauth

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo-sipidu.png')}}" alt="" height="50">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('assets/images/sumedang.png')}}" alt="" height="35">
                        </span>
                    </a>
                </div>

            </div> <!-- end container-fluid-->
        </div>
        <!-- end Topbar -->

        <div class="topbar-menu">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="{{url('/')}}"><i class="icon-speedometer"></i>Dashboard</a>
                        </li>
                        @auth
                        <li class="has-submenu">
                            <a href="{{url('pengguna')}}"><i class="icon-user"></i>Pengguna</a>
                        </li>

                        <li class="has-submenu">
                            <a href="{{url('objek-pajak')}}"><i class="icon-home"></i>Objek Pajak</a>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="icon-envelope"></i> Persuratan <div class="arrow-down"></div></a>
                            <ul class="submenu">
                                <li><a href="#">Surat Pemberitahuan Objek Pajak (SPOP)</a></li>
                                <li><a href="#">Lampiran Surat Pemberitahuan Objek Pajak (LSPOP)</a></li>
                            </ul>
                        </li>
                        @endauth

                    </ul>
                    <!-- End navigation menu -->

                    <div class="clearfix"></div>
                </div>
                <!-- end #navigation -->
            </div>
            <!-- end container -->
        </div>
        <!-- end navbar-custom -->

    </header>
    @yield('content')
    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    2021 &copy; DISKOMINFOSANDITIK
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    @include('sweetalert::alert')

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    @yield('js')

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

</html>
