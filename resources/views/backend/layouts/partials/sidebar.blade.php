<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="admin-image"> <img src="{{ getImage('teachers', Auth::user()->image) }}" alt=""> </div>
        <div class="admin-action-info">
            <h3>{{ Auth::user()->name }}</h3>
            @php
                $user = Auth::user();

                // Get the roles of the user
                $roles = $user->roles;

            @endphp
            <span>{{ $roles->first()->name }}</span>
            <ul>

                <li><a data-placement="bottom" title="Go to Profile" href="{{ route('admin.users.show', Auth::id()) }}"><i class="zmdi zmdi-account"></i></a></li>
                <li><a href="{{ route('admin.settings.index') }}" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                <li>
                    <a data-placement="bottom" title="Logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{-- {{ __('Logout') }} --}}
                     <i class="zmdi zmdi-sign-in"></i>
                 </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class=""><a href="{{ route('admin.home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            @php
                $teacher = ['admin.users.index', 'admin.users.create'];
            @endphp

            @can('users.view')
            <li class="{{ in_array($currentUrl, $teacher) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Users</span> </a>
                <ul class="ml-menu">
                    @can('users.view')
                    <li class="{{ in_array($currentUrl, ['admin.users.index']) ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">All Users</a></li>
                    @endcan

                    @can('users.create')
                    <li class="{{ in_array($currentUrl, ['admin.users.create']) ? 'active' : '' }}"><a href="{{ route('admin.users.create') }}">Add Users</a></li>
                    @endcan
                </ul>
            </li>
            @endcan


            @php
                $deg = ['admin.designations.index', 'admin.designations.create'];
            @endphp

            @if(auth()->user()->can('designations.view') || auth()->user()->can('designations.create'))

            <li class="{{ in_array($currentUrl, $deg) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span> Designation </span> </a>
                <ul class="ml-menu">
                    @can('designations.view')
                    <li class="{{ in_array($currentUrl, ['admin.designations.index']) ? 'active' : '' }}"><a href="{{ route('admin.designations.index') }}">All  Designation </a></li>
                    @endcan
                    @can('designations.create')
                    <li class="{{ in_array($currentUrl, ['admin.designations.create']) ? 'active' : '' }}"><a href="{{ route('admin.designations.create') }}">Add  Designation </a></li>
                    @endcan
                </ul>
            </li>
            @endif


            @php
                $noc = ['admin.noces.index', 'admin.noces.create'];
            @endphp

            @if(auth()->user()->can('noces.view') || auth()->user()->can('noces.create'))

            <li class="{{ in_array($currentUrl, $noc) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span> NOC </span> </a>
                <ul class="ml-menu">
                    @can('noces.view')
                    <li class="{{ in_array($currentUrl, ['admin.noces.index']) ? 'active' : '' }}"><a href="{{ route('admin.noces.index') }}">All  NOC </a></li>
                    @endcan
                    @can('noces.create')
                    <li class="{{ in_array($currentUrl, ['admin.noces.create']) ? 'active' : '' }}"><a href="{{ route('admin.noces.create') }}">Add  NOC </a></li>
                    @endcan
                </ul>
            </li>
            @endif



            @php
                $leaders = ['admin.leadership.index', 'admin.leadership.create'];
            @endphp

            @if(auth()->user()->can('leadership.view') || auth()->user()->can('leadership.create'))

            <li class="{{ in_array($currentUrl, $leaders) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>LeaderShips</span> </a>
                <ul class="ml-menu">
                    @can('leadership.view')
                    <li class="{{ in_array($currentUrl, ['admin.leadership.index']) ? 'active' : '' }}"><a href="{{ route('admin.leadership.index') }}">All LeaderShips</a></li>
                    @endcan
                    @can('leadership.create')
                    <li class="{{ in_array($currentUrl, ['admin.leadership.create']) ? 'active' : '' }}"><a href="{{ route('admin.leadership.create') }}">Add LeaderShip</a></li>
                    @endcan
                </ul>
            </li>
            @endif


            @php
                $pages = ['admin.pages.index', 'admin.pages.create'];
            @endphp

            @if(auth()->user()->can('pages.view') || auth()->user()->can('pages.create'))
            <li class="{{ in_array($currentUrl, $pages) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Pages</span> </a>
                <ul class="ml-menu">
                    @can('pages.view')
                    <li class="{{ in_array($currentUrl, ['admin.pages.index']) ? 'active' : '' }}"><a href="{{ route('admin.pages.index') }}">All Pages</a></li>
                    @endcan
                    @can('pages.create')
                    <li class="{{ in_array($currentUrl, ['admin.pages.create']) ? 'active' : '' }}"><a href="{{ route('admin.pages.create') }}">Add Pages</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @php
                $front = ['admin.sliders.index', 'admin.historical-outline.index', 'admin.university-glance.index', 'admin.honoris-causas.index', 'admin.vice-chanchellors.index', 'admin.university-ordinances.index', 'admin.missionvision.index', 'admin.home_block_types.index'];
            @endphp
            @can('add-sliders')
            <li class="{{ in_array($currentUrl, $front) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Front End</span> </a>
                <ul class="ml-menu">

                    @can('sliders.view')
                    <li class="{{ in_array($currentUrl, ['admin.sliders.index']) ? 'active' : '' }}">
                        <a href="{{ route('admin.sliders.index') }}">Home Slider</a></li>
                    @endcan

                    @can('historical-outline.view')
                    <li class="{{ in_array($currentUrl, ['admin.historical-outline.index']) ? 'active' : '' }}">
                        <a href="{{ route('admin.historical-outline.index') }}">Historical Outline</a></li>
                    @endcan

                    @can('university-glance.view')
                    <li class="{{ in_array($currentUrl, ['admin.university-glance.index']) ? 'active' : '' }}">
                        <a href="{{ route('admin.university-glance.index') }}">University Glance</a></li>
                    @endcan

                    @can('honoris-causas.view')
                    <li class="{{ in_array($currentUrl, ['admin.honoris-causas.index']) ? 'active' : '' }}">
                        <a href="{{ route('admin.honoris-causas.index') }}">Honoris Causas</a></li>
                    @endcan

                    @can('vice-chanchellors.view')

                    <li class="{{ in_array($currentUrl, ['admin.vice-chanchellors.index']) ? 'active' : '' }}">
                        <a href="{{ route('admin.vice-chanchellors.index') }}">Vice Chancellors</a></li>
                    @endcan

                    @can('university-ordinances.view')
                    <li class="{{ in_array($currentUrl, ['admin.university-ordinances.index']) ? 'active' : '' }}">
                        <a href="{{ route('admin.university-ordinances.index') }}">University Ordinances</a>
                    </li>
                    @endcan

                    @can('missionvision.view')
                    <li class="{{ in_array($currentUrl, ['admin.missionvision.index']) ? 'active' : '' }}"><a href="{{ route('admin.missionvision.index') }}">Vision & Mission</a></li>
                    @endcan

                    @can('home_block_types.view')
                    <li class="{{ in_array($currentUrl, ['admin.home_block_types.index']) ? 'active' : '' }}"><a href="{{ route('admin.home_block_types.index') }}">Home Blocks </a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @php
                $department = ['admin.department.index', 'admin.department.create'];
            @endphp
            @if(auth()->user()->can('department.view') || auth()->user()->can('department.create'))
            <li class="{{ in_array($currentUrl, $department) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Departments</span> </a>
                <ul class="ml-menu">
                    @can('department.view')
                    <li class="{{ in_array($currentUrl, ['admin.department.index']) ? 'active' : '' }}"><a href="{{ route('admin.department.index') }}">All Departments</a></li>
                    @endcan

                    @can('department.create')
                    <li class="{{ in_array($currentUrl, ['admin.department.create']) ? 'active' : '' }}"><a href="{{ route('admin.department.create') }}">Add Departments</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @php
                $institutes = ['admin.institutes.index', 'admin.institutes.create'];
            @endphp

            @if(auth()->user()->can('institutes.view') || auth()->user()->can('institutes.create'))
            <li class="{{ in_array($currentUrl, $institutes) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Institutes</span> </a>
                <ul class="ml-menu">
                    @can('institutes.view')
                    <li class="{{ in_array($currentUrl, ['admin.institutes.index']) ? 'active' : '' }}"><a href="{{ route('admin.institutes.index') }}">All Institute</a></li>
                    @endcan

                    @can('institutes.create')
                    <li class="{{ in_array($currentUrl, ['admin.institutes.create']) ? 'active' : '' }}"><a href="{{ route('admin.institutes.create') }}">Add Institute</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @php
                $students = ['admin.students-page.index', 'admin.students-page.create'];
            @endphp
            @if(auth()->user()->can('students-page.view') || auth()->user()->can('students-page.create'))

            @endif
            <li class="{{ in_array($currentUrl, $students) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Students Page</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.students-page.index']) ? 'active' : '' }}"><a href="{{ route('admin.students-page.index') }}">All Student Pages</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.students-page.create']) ? 'active' : '' }}"><a href="{{ route('admin.students-page.create') }}">Add Student Pages</a></li>
                </ul>
            </li>

            @php
                $faculties = ['admin.faculties.index', 'admin.faculties.create'];
            @endphp
            @if(auth()->user()->can('faculties.view') || auth()->user()->can('faculties.create'))
            <li class="{{ in_array($currentUrl, $faculties) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Faculties</span> </a>
                <ul class="ml-menu">

                    @can('faculties.view')
                    <li class="{{ in_array($currentUrl, ['admin.faculties.index']) ? 'active' : '' }}"><a href="{{ route('admin.faculties.index') }}">All Faculties</a></li>
                    @endcan
                    @can('faculties.create')
                    <li class="{{ in_array($currentUrl, ['admin.faculties.create']) ? 'active' : '' }}"><a href="{{ route('admin.faculties.create') }}">Add Faculty</a></li>
                    @endcan
                </ul>
            </li>
            @endif
            @php
                $programs = ['admin.programs.index', 'admin.programs.create'];
            @endphp

            @if(auth()->user()->can('programs.view') || auth()->user()->can('programs.create'))

            <li class="{{ in_array($currentUrl, $programs) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Programs</span> </a>
                <ul class="ml-menu">
                    @can('programs.view')
                    <li class="{{ in_array($currentUrl, ['admin.programs.index']) ? 'active' : '' }}"><a href="{{ route('admin.programs.index') }}">All Programs</a></li>
                    @endcan
                    @can('programs.create')
                    <li class="{{ in_array($currentUrl, ['admin.programs.create']) ? 'active' : '' }}"><a href="{{ route('admin.programs.create') }}">Add Program</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @php
                $news = ['admin.news.index', 'admin.news.add'];
                $events = ['admin.events.index', 'admin.events.create'];
                $notices = ['admin.notices.index', 'admin.notices.create'];
                $admissions = ['admin.admissions.index', 'admin.admissions.create'];
                $libraries = ['admin.libraries.index', 'admin.libraries.create'];
                $academic_calendars = ['admin.academic_calendars.index', 'admin.academic_calendars.create'];
                $offices = ['admin.offices.index', 'admin.offices.create'];
                $researchs = ['admin.researchs.index', 'admin.researchs.create', 'admin.research_center.index', 'admin.research_center.create'];
            @endphp

            @if(auth()->user()->can('offices.view') || auth()->user()->can('offices.create'))
            <li class="{{ in_array($currentUrl, $offices) ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Offices</span> </a>
                <ul class="ml-menu">
                    @can('offices.view')
                    <li class="{{ in_array($currentUrl, ['admin.offices.index']) ? 'active' : '' }}"> <a href="{{ route('admin.offices.index') }}">Office List</a></li>
                    @endcan

                    @can('offices.create')
                    <li class="{{ in_array($currentUrl, ['admin.offices.create']) ? 'active' : '' }}"> <a href="{{ route('admin.offices.create') }}">Add office</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('news.view') || auth()->user()->can('news.create'))
            <li class="{{ in_array($currentUrl, $news) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>News</span> </a>
                <ul class="ml-menu">
                    @can('news.view')
                    <li class="{{ in_array($currentUrl, ['admin.news.index']) ? 'active' : '' }}"> <a href="{{ route('admin.news.index') }}">News List</a></li>
                    @endcan
                    @can('news.create')
                    <li class="{{ in_array($currentUrl, ['admin.news.create']) ? 'active' : '' }}"> <a href="{{ route('admin.news.create') }}">Add News</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('libraries.view') || auth()->user()->can('libraries.create'))
            <li class="{{ in_array($currentUrl, $libraries) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Library</span> </a>
                <ul class="ml-menu">
                    @can('libraries.view')
                    <li class="{{ in_array($currentUrl, ['admin.libraries.index']) ? 'active' : '' }}"> <a href="{{ route('admin.libraries.index') }}">Libraries List</a></li>
                    @endcan
                    @can('libraries.create')
                    <li class="{{ in_array($currentUrl, ['admin.libraries.create']) ? 'active' : '' }}"> <a href="{{ route('admin.libraries.create') }}">Add Library</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('academic_calendars.view') || auth()->user()->can('academic_calendars.create'))
            <li class="{{ in_array($currentUrl, $academic_calendars) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Academic Calendars</span> </a>
                <ul class="ml-menu">
                    @can('academic_calendars.view')
                    <li class="{{ in_array($currentUrl, ['admin.academic_calendars.index']) ? 'active' : '' }}"> <a href="{{ route('admin.academic_calendars.index') }}">Calendar List</a></li>
                    @endcan
                    @can('academic_calendars.create')
                    <li class="{{ in_array($currentUrl, ['admin.academic_calendars.create']) ? 'active' : '' }}"> <a href="{{ route('admin.academic_calendars.create') }}">Add Calender</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('events.view') || auth()->user()->can('events.create'))
            <li class="{{ in_array($currentUrl, $events) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Events</span> </a>
                <ul class="ml-menu">
                    @can('events.view')
                    <li class="{{ in_array($currentUrl, ['admin.events.index']) ? 'active' : '' }}"> <a href="{{ route('admin.events.index') }}">Event List</a></li>
                    @endcan
                    @can('events.create')
                    <li class="{{ in_array($currentUrl, ['admin.events.create']) ? 'active' : '' }}"> <a href="{{ route('admin.events.create') }}">Add Event</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('notices.view') || auth()->user()->can('notices.create'))
            <li class="{{ in_array($currentUrl, $notices) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Notices</span> </a>
                <ul class="ml-menu">
                    @can('notices.view')
                    <li class="{{ in_array($currentUrl, ['admin.notices.index']) ? 'active' : '' }}"> <a href="{{ route('admin.notices.index') }}">Notice List</a></li>
                    @endcan
                    @can('notices.create')
                    <li class="{{ in_array($currentUrl, ['admin.notices.create']) ? 'active' : '' }}"> <a href="{{ route('admin.notices.create') }}">Add Notice</a></li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(auth()->user()->can('admissions.view') || auth()->user()->can('admissions.create'))
            <li class="{{ in_array($currentUrl, $admissions) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Admissions</span> </a>
                <ul class="ml-menu">
                    @can('admissions.view')
                    <li class="{{ in_array($currentUrl, ['admin.admissions.index']) ? 'active' : '' }}"> <a href="{{ route('admin.admissions.index') }}">Admissions List</a></li>
                    @endcan
                    @can('admissions.create')
                    <li class="{{ in_array($currentUrl, ['admin.admissions.create']) ? 'active' : '' }}"> <a href="{{ route('admin.admissions.create') }}">Create Admissions</a></li>
                    @endcan
                </ul>
            </li>
            @endif
                @php
                    $committee = ['admin.regent_board.index', 'admin.planning_work_committee.index', 'admin.academic_council.index', 'admin.finance_committee.index'];
                @endphp
            @if(auth()->user()->can('regentboard.view') || auth()->user()->can('planning.work.view') || auth()->user()->can('academic.council.view') || auth()->user()->can('finance.committee.view'))
            <li class="{{ in_array($currentUrl, $committee) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>University Governance</span> </a>
                <ul class="ml-menu">
                    @can('regentboard.view')
                    <li class="{{ in_array($currentUrl, ['admin.regent_board.index']) ? 'active' : '' }}"> <a href="{{ route('admin.regent_board.index') }}">Regent Board Committees</a></li>
                    @endcan
                    @can('planning.work.view')
                    <li class="{{ in_array($currentUrl, ['admin.planning_work_committee.index']) ? 'active' : '' }}"> <a href="{{ route('admin.planning_work_committee.index') }}">Planing Work Committees</a></li>
                    @endcan
                    @can('academic.council.view')
                    <li class="{{ in_array($currentUrl, ['admin.academic_council.index']) ? 'active' : '' }}"> <a href="{{ route('admin.academic_council.index') }}">Academic Council</a></li>
                    @endcan
                    @can('finance.committee.view')
                    <li class="{{ in_array($currentUrl, ['admin.finance_committee.index']) ? 'active' : '' }}"> <a href="{{ route('admin.finance_committee.index') }}">Finance Committees</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('researchs.view') || auth()->user()->can('researchs.create'))
            <li class="{{ in_array($currentUrl, $researchs) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Researches</span> </a>
                <ul class="ml-menu">
                    @can('researchs.view')
                    <li class="{{ in_array($currentUrl, ['admin.researchs.index']) ? 'active' : '' }}"> <a href="{{ route('admin.researchs.index') }}">Research List</a></li>
                    @endcan
                    @can('researchs.create')
                    <li class="{{ in_array($currentUrl, ['admin.researchs.create']) ? 'active' : '' }}"> <a href="{{ route('admin.researchs.create') }}">Add Research</a></li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(auth()->user()->can('researchs.view') || auth()->user()->can('researchs.create'))
            <li class="{{ in_array($currentUrl, $researchs) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Research Centers</span> </a>
                <ul class="ml-menu">
                    @can('researchs.view')
                    <li class="{{ in_array($currentUrl, ['admin.research_center.index']) ? 'active' : '' }}"> <a href="{{ route('admin.research_center.index') }}">Centers List</a></li>
                    @endcan
                    @can('researchs.create')
                    <li class="{{ in_array($currentUrl, ['admin.research_center.create']) ? 'active' : '' }}"> <a href="{{ route('admin.research_center.create') }}">Add Research Center</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @php
                $permissions = ['admin.permissions.index', 'admin.permissions.add'];
                $roles = ['admin.roles.index', 'admin.roles.create'];
            @endphp

            @if(auth()->user()->can('permissions.view') || auth()->user()->can('roles.view'))
            <li class="{{ in_array($currentUrl, $permissions) || in_array($currentUrl, $roles) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-key"></i><span>Role & Permissions</span> </a>
                <ul class="ml-menu">
                    @can('permissions.view')
                    <li class="{{ in_array($currentUrl, $permissions) ? 'active' : '' }}"><a href="{{ route('admin.permissions.index') }}">All Permissions</a></li>
                    @endcan
                    @can('roles.view')
                    <li class="{{ in_array($currentUrl, $roles) ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                    @endcan
                </ul>
            </li>
            @endif

            @if(auth()->user()->can('images.view') || auth()->user()->can('images.create'))
            <li class="{{ in_array($currentUrl, ['admin.images.index']) ? 'active' : '' }}"><a href="{{ route('admin.images.index') }}"><i class="zmdi zmdi-view-web"></i><span>Images</span></a></li>
            @endif

            @if(auth()->user()->can('settings.view') || auth()->user()->can('settings.create'))
            <li class="{{ in_array($currentUrl, ['admin.settings.index']) ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}"><i class="zmdi zmdi-settings"></i><span>Settings</span></a></li>
            @endif


            <li style="height: 100px;">
                 
            </li>

        </ul>
    </div>
    <!-- #Menu -->
</aside>
