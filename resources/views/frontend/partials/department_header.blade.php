<div class="top-bar-area bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 logo-box">
                <a href="{{ route('front.home') }}"><img src="{{ getImage('settings', getSetting('logo')) }}" alt="Thumb" height="40"></a>
            </div>
            <div class="col-md-6">
                <a href=""> <span class="deptHeading">Department of @stack('department')</span> </a>
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
