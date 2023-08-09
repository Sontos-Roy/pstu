<div class="top-bar-area bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9 text-center">
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
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                    <li>
                        <a href="{{ route('front.home') }}" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                        <ul class="dropdown-menu animated #">
                            <li></li>
                        </ul>
                    </li>
                    <li class="dropdown on">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About</a>
                        <ul class="dropdown-menu animated #">
                            <li><a href="{{ route('front.departments.mission', [request()->segment(2)]) }}">Mission &amp; Vision</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academic</a>
                        <ul class="dropdown-menu animated">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programs</a>
                                <ul class="dropdown-menu animated">
                                    <li><a href="">BS in Applied Mathematics</a></li>
                                    <li><a href="">MS in Applied Mathematics</a></li>
                                    <li><a href="">MPhil in Applied Mathematics</a></li>
                                    <li><a href="">PhD in Applied Mathematics</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('front.departments.calendar', [request()->segment(2)]) }}">Academic Calendar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">People</a>
                        <ul class="dropdown-menu animated">
                            <li><a href="{{ route('front.departments.peoples', [request()->segment(2)]) }}">Faculty Members</a></li>
                            <li><a href="{{ route('front.departments.peoples', [request()->segment(2)]) }}">Officers and Staff</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Research</a>
                        <ul class="dropdown-menu animated">
                            <li><a href="">Research Area</a></li>
                            <li><a href="">Funded Projects</a></li>
                            <li><a href="">Publications</a></li>
                            <li><a href="">Research Facilities</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student</a>
                        <ul class="dropdown-menu animated">
                            <li><a href="">Student Activities</a></li>
                            <li><a href="">Student Achievements</a></li>
                            <li><a href="">Scholarships &amp; Financial Aids</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumni</a>
                        <ul class="dropdown-menu animated">
                            <li><a href="">Notable Alumni</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                    @php
                    $items=DB::table('pages')->where('page_slug','department')->select('title','slug')->get();
                    @endphp

                    @if($items->count())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other</a>
                            <ul class="dropdown-menu animated">
                                @foreach($items as $item)
                                <li><a href="{{ route('front.departmentPageView',[$item->slug])}}"> {{$item->title}} </a></li>
                                @endforeach
                            </ul>
                        </li>

                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>        <!-- End Navigation -->

</header>
