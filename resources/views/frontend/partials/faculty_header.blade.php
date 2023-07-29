<div class="top-bar-area bg-dark text-light">

    <div class="container">
        <div class="row">
            <div class="col-md-3 logo-box">
                <a href="{{ route('front.home') }}"><img src="{{ getImage('settings', getSetting('logo')) }}" alt="Thumb" height="40"></a>
            </div>
            <div class="col-md-6">
                <a href=""> <span class="deptHeading">@stack('faculty')</span> </a>
            </div>
            <div class="col-md-3 link text-right">
                <ul>
                    @auth()
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header
============================================= -->
<header id="home">
    <nav class="navbar top-pad navbar-default attr-border-none navbar-fixed navbar-transparent white bootsnav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-center" data-in="#" data-out="#">
                    <li class="dropdown">
                        <a href="https://www.du.ac.bd/faculty/FACSCI">Home</a>

                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About</a>
                        <ul class="dropdown-menu animated #">

                            <li><a href="https://www.du.ac.bd/facultyMissionVision/FACSCI">Mission &amp; Vision</a></li>

                        </ul>
                    </li>
                    <li class="dropdown on">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics</a>
                        <ul class="dropdown-menu animated #">
                            <li><a href="https://www.du.ac.bd/allDepartments/FACSCI">Academic Departments</a></li>
                            <li><a href="https://www.du.ac.bd/calendar/FACSCI">Academic calendar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Scholarships and Award </a>
                        <ul class="dropdown-menu animated" style="display: none; opacity: 1;">
                            <li><a href="https://www.du.ac.bd/faculty_deans_award_teacher/FACSCI">Deans Award(Teacher)</a></li>
                            <li><a href="https://www.du.ac.bd/faculty_deans_award_std/FACSCI">Deans Award(Student)</a></li>
                            <li><a href="https://www.du.ac.bd/trust_fund/FACSCI">Trust Fund</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="https://www.du.ac.bd/faculty/achievement/FACSCI">Faculty Achievement</a>
                    </li>
                    <li class="dropdown">
                        <a href="https://www.du.ac.bd/faculty/contact/FACSCI">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>        <!-- End Navigation -->
</header>
