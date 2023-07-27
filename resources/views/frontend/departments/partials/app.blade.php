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
    <style>
        .deptHeading{
            font-size: 2vw;
            font-weight: 700;
        }
    </style>

</head>
<body>
    <div class="top-bar-area bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo-box">
                    <a href="{{ route('front.home') }}"><img src="{{ getImage('settings', getSetting('logo')) }}" alt="Thumb" height="40"></a>
                </div>
                <div class="col-md-6">
                    <a href=""> <span class="deptHeading">Faculty of Science</span> </a>
                </div>
                <div class="col-md-3 link text-right">
                    <ul>
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


            <!-- End Top Search -->

            <div class="container">

                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="">
                    <img src="{{ getImage('settings', getSetting('logo')) }}" width="84" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-left" data-in="#" data-out="#">
                        <li>
                            <a href="https://www.du.ac.bd" class="dropdown-toggle" data-toggle="dropdown">DU Home</a>
                        </li>
                        <li>
                            <a href="https://www.du.ac.bd/body/APMAT" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                            <ul class="dropdown-menu animated #">
                                <li></li>
                            </ul>
                        </li>
                        <li class="dropdown on">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About</a>
                            <ul class="dropdown-menu animated #" style="display: block; opacity: 0;">
                                <li><a href="https://www.du.ac.bd/body/History/APMAT">History</a></li>
                                <li><a href="https://www.du.ac.bd/body/MissionVision/APMAT">Mission &amp; Vision</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academic</a>
                            <ul class="dropdown-menu animated">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programs</a>
                                    <ul class="dropdown-menu animated">
                                        <li><a href="https://www.du.ac.bd/programDetails/APMAT/70">BS in Applied Mathematics</a></li>
                                        <li><a href="https://www.du.ac.bd/programDetails/APMAT/71">MS in Applied Mathematics</a></li>
                                        <li><a href="https://www.du.ac.bd/programDetails/APMAT/72">MPhil in Applied Mathematics</a></li>
                                        <li><a href="https://www.du.ac.bd/programDetails/APMAT/73">PhD in Applied Mathematics</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://www.du.ac.bd/body/AcademicCalender/APMAT">Academic Calendar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">People</a>
                            <ul class="dropdown-menu animated">
                                <li><a href="https://www.du.ac.bd/body/FacultyMembers/APMAT">Faculty Members</a></li>
                                <li><a href="https://www.du.ac.bd/body/officers_staffs/APMAT">Officers and Staff</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Research</a>
                            <ul class="dropdown-menu animated">
                                <li><a href="https://www.du.ac.bd/researchArea/dept/APMAT">Research Area</a></li>
                                <li><a href="https://www.du.ac.bd/fundedProject/dept/APMAT">Funded Projects</a></li>
                                <li><a href="https://www.du.ac.bd/publication/APMAT">Publications</a></li>
                                <li><a href="https://www.du.ac.bd/researchFacilities/dept/APMAT">Research Facilities</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student</a>
                            <ul class="dropdown-menu animated">
                                <li><a href="https://www.du.ac.bd/stdActivities/dept/APMAT">Student Activities</a></li>
                                <li><a href="https://www.du.ac.bd/stdAchievement/dept/APMAT">Student Achievements</a></li>
                                <li><a href="https://www.du.ac.bd/scholarshipAndFinAid/APMAT">Scholarships &amp; Financial Aids</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumni</a>
                            <ul class="dropdown-menu animated">
                                <li><a href="https://www.du.ac.bd/body/NotableAlumni/APMAT">Notable Alumni</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="https://www.du.ac.bd/body/contact/APMAT">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    @yield('content')


    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">

                    <!-- Single item -->
                    <div class="col-md-4 col-sm-6 item equal-height" style="height: 325px;">
                        <div class="info-box">

                            <h4>Contact</h4>
                                {{ getSetting('address') }}
                            <ul>
                                                                <li>
                                        <i class="fa fa-envelope"></i>
                                        <span><a href="mailto:{{ getSetting('email') }}">{{ getSetting('email') }}</a></span>

                                    </li>
                                                            <li>
                                    <p style="letter-spacing: 3px;"><i class="fas fa-phone"></i>{{ getSetting('phone') }} ({{ getSetting('alt_phone') }})</p>
                                </li>
                            </ul>

                        </div>
                        <br>
                        <h4>Follow Us On</h4>
                        <div class="top-bar-area bg-dark-top text-light" style="background: transparent;">
                            <div class="container">
                                <div class="row">
                                    <div class="address-info text-left">
                                        <div class="info">
                                            <ul>
                                                <ul>
                                                    <li class="facebook">
                                                        <a href="{{ getSetting('facebook') }}"><i class="fab fa-facebook-f" style="font-size:24px;"></i></a>
                                                    </li>
                                                    <li class="twitter">
                                                        <a href="{{ getSetting('twitter') }}"><i class="fab fa-twitter" style="font-size:24px;"></i></a>
                                                    </li>

                                                    <li class="youtube">
                                                        <a href="{{ getSetting('youtube') }}"><i class="fab fa-youtube" style="font-size:24px;"></i></a>
                                                    </li>
                                                </ul>

                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- End Single item -->

                    <!-- Single item -->
                    <div class="col-md-4 col-sm-6 item equal-height" style="height: 325px;">
                        <div class="f-item popular-courses">
                            <h4>Other Links</h4>
                                                        <ul>
                                    <li>
                                        <a href="#"><i class="ti-angle-right"></i> Career</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ti-angle-right"></i> Webmail</a>
                                    </li>






                                    <li>
                                        <a href="#"><i class="ti-angle-right"></i> Website</a>
                                    </li>

                                </ul>

                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="col-md-4 col-sm-6 item equal-height" style="height: 325px;">
                        <h4>Find us on Map</h4>
                                                                    <iframe width="400" height="280" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC8wswqDdnAsOxFmeY3M46dFz2q_CfoqvU
                                &amp;q=23.727651106831065,90.40195521534076" allowfullscreen="">
                            </iframe>

                    </div>
                    <!-- End Single item -->

                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        {!! getSetting('copyright') !!}
                    </div>

                </div>
            </div>
        </div>
    </footer>

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
