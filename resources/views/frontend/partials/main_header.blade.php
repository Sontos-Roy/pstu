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
                                            <li>
                                                <a href="{{ route('front.regent_borad') }}">
                                                    <i class="fas fa-angle-double-right"></i>
                                                    Regent Board
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.academic_council') }}">
                                                    <i class="fas fa-angle-double-right"></i>
                                                    Academic council
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.finanace_committee') }}">
                                                    <i class="fas fa-angle-double-right"></i>
                                                    Finance Committee
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.planning_work_committee') }}">
                                                    <i class="fas fa-angle-double-right"></i>
                                                    Planning and Works Committee
                                                </a>
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
                                                <li><a href="{{ route('front.academic.calendar') }}"><i class="fas fa-angle-double-right"></i> Academic Calendar</a>
                                                </li>
                                                <li><a href="{{ route('front.libraries') }}"><i class="fas fa-angle-double-right"></i>
                                                        Libraries </a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-4">
                                        <h6 class="title menuTitle">Academic Bodies</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="{{ route('front.faculties.all') }}"><i class="fas fa-angle-double-right"></i>
                                                        Faculties</a>
                                                </li>
                                                <li><a href="{{ route('front.departments') }}"><i class="fas fa-angle-double-right"></i>
                                                        Departments</a></li>
                                                <li><a href="{{ route('front.institutes.all') }}"><i class="fas fa-angle-double-right"></i>
                                                        Institutes</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-4">
                                        <h6 class="title menuTitle">Admission</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                @foreach (getAdmissions()->take(6) as $admission)
                                                <li>
                                                    <a href="{{ route('front.get.admissions', $admission->slug) }}">
                                                    <i class="fas fa-angle-double-right"></i> {{ $admission->title }}
                                                    </a>
                                                    </li>
                                                @endforeach

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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <span></span></a>
                        <ul class="dropdown-menu megamenu-content animated menuBody fadeOutUp" role="menu" style="display: none;">
                            <li>
                                <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title menuTitle">Academic Heads</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="{{ route('front.get.deans') }}"><i class="fas fa-angle-double-right"></i> Deans of
                                                    Faculties</a>
                                                    </li>
                                                    <li><a href="{{ route('front.get.heads') }}"><i class="fas fa-angle-double-right"></i> Chairman of
                                                    Departments</a>
                                                    </li>
                                                <li><a href="{{ route('front.institutes.directors') }}"><i class="fas fa-angle-double-right"></i> Directors of
                                                        Institutes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-4">
                                        <h6 class="title menuTitle">Head of Administrative Offices</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href=""><i class="fas fa-angle-double-right"></i> Directors
                                                        of
                                                        Research Centers &amp; Bureau</a></li>
                                                <li><a href=""><i class="fas fa-angle-double-right"></i> Provosts &amp; Wardens of
                                                        Halls and
                                                        Hostel</a></li>
                                                <li><a href="{{ route('front.officers') }}"><i class="fas fa-angle-double-right"></i> Head of
                                                        Offices</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-menu col-md-4">
                                        <h6 class="title menuTitle">Others</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="{{ route('front.all.offices') }}"><i class="fas fa-angle-double-right"></i> All
                                                        Offices</a></li>
                                                <li><a href=""><i class="fas fa-angle-double-right"></i>
                                                        Faculty Member
                                                        Profile</a>
                                                </li>
                                                <li><a href=""><i class="fas fa-angle-double-right"></i> Officer Profile</a>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Students
                            <span></span></a>
                        <ul class="dropdown-menu megamenu-content animated menuBody fadeOutUp" role="menu" style="display: none; opacity: 1;">
                            <li>
                                <div class="row">

                        <div class="col-menu col-md-4">
                            <h6 class="title menuTitle">Student
                                Facilities</h6>
                            <div class="content">
                                <ul class="menu-col">
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>
                                            Scholarships &amp;
                                            Financial Aids</a></li>
                                    <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                            Halls of Residence
                                        </a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>
                                            Transport
                                            Facilities</a>
                                    </li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>
                                            Health Insurance </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-menu col-md-4">
                            <h6 class="title menuTitle">Online Services
                            </h6>
                            <div class="content">
                                <ul class="menu-col">
                                    <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                            Apply for
                                            Certificate/Marksheet</a>
                                    </li>
                                    <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                            Apply
                                            for Govt. Scholarships</a>
                                    </li>
                                    <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                            Examination
                                            Results</a>
                                    </li>
                                    <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                            Apply for
                                            Transcript</a>
                                    </li>
                                    <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                            Exam Form Fill-up</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-menu col-md-4">
                            <h6 class="title menuTitle">Alumni</h6>
                            <div class="content">
                                <ul class="menu-col">
                                        <li><a href=""><i class="fas fa-angle-double-right"></i>
                                            Alumni
                                            Association</a>
                                        </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        </li>
                        </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="Shortcodes">Research
                                <span></span></a>

                            <ul class="dropdown-menu menuBody animated fadeOutUp" style="display: none; opacity: 1;">
                                <li><a href=""><i class="fas fa-angle-double-right"></i>
                                        Research Centers &amp; Bureaus</a></li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i>
                                        Research &amp; Publications</a></li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i>
                                        Research Collaboration</a></li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i> Funded
                                        Projects</a></li>
                                <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                        University Journals</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="Shortcodes">Links
                                <span></span></a>

                            <ul class="dropdown-menu menuBody animated">
                                <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                        Registered Graduate</a></li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i>
                                        DU Login</a></li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i>
                                        Student Login</a></li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i>
                                        Telephone and Email Index</a></li>

                                <li><a href=""><i class="fas fa-angle-double-right"></i> DU Forms</a>
                                </li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i> Approved
                                        NOC/GO</a></li>
                                <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i>
                                        E-Tender</a></li>
                                <li><a href="" target="_blank"><i class="fas fa-angle-double-right"></i> DU Jobs</a>
                                </li>
                                <li><a href=""><i class="fas fa-angle-double-right"></i> Trust
                                        Funds</a></li>

                                <li><a href="{{ route('front.notices') }}"><i class="fas fa-angle-double-right"></i> Notice</a>
                                </li>
                                <li><a href="{{ route('front.news') }}"><i class="fas fa-angle-double-right"></i> Latest
                                        News</a>
                                </li>
                                <li><a href="{{ route('front.events') }}"><i class="fas fa-angle-double-right"></i> Events</a>
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
