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
                        <a href="">Home</a>

                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About</a>
                        <ul class="dropdown-menu animated #">

                            <li><a href="{{ route('front.faculties.mission', [request()->segment(2)]) }}">Mission &amp; Vision</a></li>

                        </ul>
                    </li>
                    <li class="dropdown on">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics</a>
                        <ul class="dropdown-menu animated #">
                            <li><a href="{{ route('front.faculties.departments', [request()->segment(2)]) }}">Academic Departments</a></li>
                            <li><a href="{{ route('front.academic.calendar', [request()->segment(2)]) }}">Academic calendar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Scholarships and Award </a>
                        <ul class="dropdown-menu animated" style="display: none; opacity: 1;">
                            <li><a href="">Deans Award(Teacher)</a></li>
                            <li><a href="">Deans Award(Student)</a></li>
                            <li><a href="">Trust Fund</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="">Faculty Achievement</a>
                    </li>
                    <li class="dropdown">
                        <a href="">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>        <!-- End Navigation -->
</header>
