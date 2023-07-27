<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="PSTU">

    <title>PSTU</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets1/img/pstulogo.png') }}" type="image/x-icon"/>

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootsnav.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->


    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800" rel="stylesheet">
    @stack('css')

</head>
<body>
    <div class="top-bar-area bg-dark inc-border text-light">
        <div class="container">
            <div class="row">

                <div class="col-md-8 address-info text-left">
                    <div class="info">
                        <ul>
                            <li class="social">
                                <a href="{{ getSetting('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ getSetting('twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{ getSetting('linkedin') }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{ getSetting('youtube') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li>
                                <i class="fas fa-user-shield"></i> Instructor: <strong>{{ getTeachers()->count() }}</strong>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i> Help Line: <strong>{{ getSetting('phone') }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 link text-right">
                    <ul>
                        <!-- <li>
                            <a href="#">Register</a>
                        </li> -->
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Header
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar top-pad navbar-default attr-border-none navbar-fixed navbar-transparent white bootsnav">

            <!-- Start Top Search -->
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Search">
                                <button type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation -->
                {{-- <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="ti-search"></i></a></li>
                    </ul>
                </div> --}}
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ route('front.home') }}">
                        <div class="p-1" style="
                        margin-top: 4px;
                        position: absolute;
                        background: white;
                        border-radius: 0 0 45% 45%; padding: 0 4px 2px;">
                            <img src="{{ getImage('settings', getSetting('logo')) }}" class="logo logo-display" alt="Logo" style="
                        width: 80px;" >
                        </div>
                        <!-- <center><span style="color:lightcoral">PSTU</span></center> -->
                        <img src="{{ getImage('settings', getSetting('logo')) }}" class="logo logo-scrolled" alt="Logo" style="width:84px;">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="">
                            <a href="{{ route('front.home') }}" class="">
                                Home
                            </a>
                        </li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About
                            <span></span>
                            </a>
                            <ul class="dropdown-menu megamenu-content animated menuBody fadeOutUp" role="menu" style="display: none; opacity: 1;">
                                <li>
                                    <div>
                                    <div class="col-menu col-md-4">
                                        <h6 class="title menuTitle">About University
                                        </h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li>
                                                <a href="{{ route('front.historic.outline') }}">
                                                <i class="fas fa-angle-double-right"></i> Historical Outlines
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{ route('front.honoris.causa') }}">
                                                <i class="fas fa-angle-double-right"></i> Honoris Causas
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{ route('front.university.glance') }}">
                                                <i class="fas fa-angle-double-right"></i>
                                                University at a
                                                Glance
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{ route('front.vice.chencellors.message', 'vice-chancellor') }}">
                                                <i class="fas fa-angle-double-right"></i>
                                                Message from the Vice
                                                Chancellor
                                                </a>
                                                </li>
                                                <li>
                                                <a href="{{ route('front.vice.chencellors') }}">
                                                <i class="fas fa-angle-double-right"></i>
                                                Vice Chencellors List
                                                </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-4">
                                        <h6 class="title menuTitle">University Leadership</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                @foreach (LeaderShips() as $item)
                                                <li><a href="{{ route('front.vice.chencellors.message', $item->slug) }}"><i class="fas fa-angle-double-right"></i>
                                                    {{ $item->designation }}</a>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-4">
                                        <h6 class="title menuTitle">Governance Framework</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="{{ route('front.university.ordinances') }}"><i class="fas fa-angle-double-right"></i>
                                                University
                                                Ordinance</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Academics <span></span></a>
                            <ul class="dropdown-menu megamenu-content animated menuBody fadeOutUp" role="menu" style="display: none;">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-4">
                                            <h6 class="title menuTitle">Academic</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ route('front.programs') }}"><i class="fas fa-angle-double-right"></i>
                                                            Academic Programs</a>
                                                    </li>
                                                    <li><a href=""><i class="fas fa-angle-double-right"></i> Academic Calendar</a>
                                                    </li>
                                                    <li><a href="https://www.du.ac.bd/libraries"><i class="fas fa-angle-double-right"></i>
                                                            Libraries </a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-4">
                                            <h6 class="title menuTitle">Academic Bodies</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ route('front.faculties') }}"><i class="fas fa-angle-double-right"></i>
                                                            Faculties</a>
                                                    </li>
                                                    <li><a href="{{ route('front.departments') }}"><i class="fas fa-angle-double-right"></i>
                                                            Departments</a></li>
                                                    <li><a href="https://www.du.ac.bd/institutes"><i class="fas fa-angle-double-right"></i>
                                                            Institutes</a></li>
                                                    <li><a href="https://www.du.ac.bd/colleges/Constituent"><i class="fas fa-angle-double-right"></i> Constituent
                                                            Colleges</a></li>
                                                    <li><a href="https://www.du.ac.bd/colleges/Affiliated"><i class="fas fa-angle-double-right"></i> Affiliated
                                                            Colleges</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-4">
                                            <h6 class="title menuTitle">Admission</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="https://www.du.ac.bd/undergraduatePrograms"><i class="fas fa-angle-double-right"></i> Undergraduate
                                                            Programs</a></li>
                                                    <li><a href="https://www.du.ac.bd/graduatePrograms"><i class="fas fa-angle-double-right"></i> Graduate
                                                            Programs</a></li>
                                                    <li><a target="_blank" href=""><i class="fas fa-angle-double-right"></i>
                                                            MPhil Programs</a>
                                                    </li>


                                                    <li><a target="_blank" href=""><i class="fas fa-angle-double-right"></i>
                                                            PhD Programs</a></li>
                                                    <li><a href=""><i class="fas fa-angle-double-right"></i> International
                                                            Students</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Faculties <span></span></a>
                            <ul class="dropdown-menu megamenu-content animated menuBody" role="menu" style="display: none; opacity: 1;">
                                <li>
                                    <div>
                                        <div class="col-menu col-md-6">
                                            <h6 class="title menuTitle">Faculties Heads</h6>
                                            <div class="content">
                                                <ul class="menu-col">

                                                    @foreach (getFaculties(0) as $item)
                                                    <li>
                                                        <a href="{{ route('front.faculties.show', $item->slug) }}">
                                                        <i class="fas fa-angle-double-right"></i> {{ $item->title }}
                                                        </a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-6">
                                            <h6 class="title menuTitle">Faculties Heads</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    @foreach (getFaculties(1) as $item)
                                                    <li>
                                                        <a href="{{ route('front.faculties.show', $item->slug) }}">
                                                        <i class="fas fa-angle-double-right"></i> {{ $item->title }}
                                                        </a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <span></span></a>
                            <ul class="dropdown-menu megamenu-content animated menuBody" role="menu">
                                <li>
                                    <div class="row">
                                    <div class="col-menu col-md-12">
                                        <h6 class="title menuTitle">Academic Heads</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="{{ route('front.get.deans') }}"><i class="fas fa-angle-double-right"></i> Deans of
                                                Faculties</a>
                                                </li>
                                                <li><a href="{{ route('front.get.heads') }}"><i class="fas fa-angle-double-right"></i> Chairman of
                                                Departments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->

                                    <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Students
                            <span></span></a>
                            <ul class="dropdown-menu animated menuBody" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="content">
                                            <ul class="menu-col">

                                                @foreach (getStudentPage() as $item)
                                                <li><a href="{{ route('front.student.page', $item->slug) }}" target="_blank"><i class="fas fa-angle-double-right"></i>
                                                    {{ $item->title }}
                                                    </a>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    @yield('content')


     <!-- Start Footer
    ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container logo">
            <div class="f-items footer-default-padding">
                <div class="row ">
                    <div class="row" style="margin-top:50px"></div>
                    <!-- Single item -->
                    <div class="col-md-4 col-sm-6 item equal-height" style="height: 222px;">
                        <div class="f-item link aos-init aos-animate" data-aos="" data-aos-duration="3000" style="line-height:18px">
                            <h4>PSTU</h4>
                            <ul>
                                <li><a href="{{ route('front.page.show', 'welcome-message') }}"><i class="ti-angle-right"></i> Overview</a></li>
                                <li> <a href="{{ route('front.historic.outline') }}"><i class="ti-angle-right"></i> Historic Outline</a> </li>
                                    <li> <a href="{{ route('front.university.glance') }}"><i class="ti-angle-right"></i> At A Glance</a> </li>
                                    <li> <a href="{{ route('front.honoris.causa') }}"><i class="ti-angle-right"></i> Honoris Causa</a> </li>


                            </ul>
                        </div>
                    </div>
                    <!-- End Single item -->


                    <!-- End Single item -->

                    <div class="col-md-4 col-sm-6 item equal-height" style="height: 222px;">
                        <div class="f-item link aos-init aos-animate" data-aos="" data-aos-duration="3000" style="line-height:18px">
                            <h4>&nbsp; LeaderShips</h4>
                            <ul>
                                @foreach (LeaderShips() as $item)
                                    <li>
                                        <a href="{{ route('front.vice.chencellors.message', $item->slug) }}" target="_blank">
                                            <i class="ti-angle-right"></i> {{ $item->designation }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Single item -->
            <!-- End Single item -->

            <!-- Single item -->
            <div class="col-md-4 col-sm-6">
                <div class="col-sm-12">
                    <img src="{{ getImage('settings', getSetting('logo')) }}" style="width:60px; height:60px;" class="logo" alt="Logo">
                    <div class="clearfix"></div>
                    <div class="footer-content urgent-need aos-init aos-animate" data-aos="" data-aos-duration="3000">
                        <p style="font-size:13px;">
                            <i class="fa fa-map-marker"></i>
                            {{ getSetting('address') }}<br>

                        </p>
                        <p>
                            <a class="telephone">
                                <b>Phone:</b> {{ getSetting('phone') }}</a>
                            <br>
                            <a class="telephone">
                                <b>Fax:</b> {{ getSetting('fax') }}</a>
                            <br>
                            <a href="mailto:{{ getSetting('email') }}">
                                <b>Email:</b> {{ getSetting('email') }}, {{ getSetting('alt_email') }}
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </div>
        </div>
        <!-- End Single item -->
        </div>


        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        {!! getSetting('copyright') !!}
                    </div>
                    <!-- <div class="col-md-4 text-right link">
                        <ul>
                            <li>
                                <a href="#" target="_blank">Admin Login</a>
                            </li>
                            <li>
                                <a href="#">Student Login</a>
                            </li>
                            <li>
                                <a href="#" target="_blank">AIS Dashboard</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- End Footer Bottom -->

    </footer>    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/count-to.js') }}"></script>
    <script src="{{ asset('frontend/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('frontend/js/loopcounter.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootsnav.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    @stack('script')

</body>

</html>
