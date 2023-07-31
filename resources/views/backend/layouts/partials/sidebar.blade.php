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
            <li class="{{ in_array($currentUrl, $teacher) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Staff</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.users.index']) ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">All Staffs</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.users.create']) ? 'active' : '' }}"><a href="{{ route('admin.users.create') }}">Add Staffs</a></li>
                </ul>
            </li>

            @php
                $leaders = ['admin.leadership.index', 'admin.leadership.create'];
            @endphp
            <li class="{{ in_array($currentUrl, $leaders) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>LeaderShips</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.leadership.index']) ? 'active' : '' }}"><a href="{{ route('admin.leadership.index') }}">All LeaderShips</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.leadership.create']) ? 'active' : '' }}"><a href="{{ route('admin.leadership.create') }}">Add LeaderShip</a></li>
                </ul>
            </li>
            @php
                $pages = ['admin.pages.index', 'admin.pages.create'];
            @endphp
            <li class="{{ in_array($currentUrl, $pages) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Pages</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.pages.index']) ? 'active' : '' }}"><a href="{{ route('admin.pages.index') }}">All Pages</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.pages.create']) ? 'active' : '' }}"><a href="{{ route('admin.pages.create') }}">Add Pages</a></li>
                </ul>
            </li>
            @php
                $front = ['admin.sliders.index', 'admin.historical-outline.index', 'admin.university-glance.index', 'admin.honoris-causas.index', 'admin.vice-chanchellors.index', 'admin.university-ordinances.index', 'admin.missionvision.index', 'admin.home_block_types.index'];
            @endphp
            @can('add-sliders')
            <li class="{{ in_array($currentUrl, $front) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Front End</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.sliders.index']) ? 'active' : '' }}"><a href="{{ route('admin.sliders.index') }}">Home Slider</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.historical-outline.index']) ? 'active' : '' }}"><a href="{{ route('admin.historical-outline.index') }}">Historical Outline</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.university-glance.index']) ? 'active' : '' }}"><a href="{{ route('admin.university-glance.index') }}">University Glance</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.honoris-causas.index']) ? 'active' : '' }}"><a href="{{ route('admin.honoris-causas.index') }}">Honoris Causas</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.vice-chanchellors.index']) ? 'active' : '' }}"><a href="{{ route('admin.vice-chanchellors.index') }}">Vice Chancellors</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.university-ordinances.index']) ? 'active' : '' }}"><a href="{{ route('admin.university-ordinances.index') }}">University Ordinances</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.missionvision.index']) ? 'active' : '' }}"><a href="{{ route('admin.missionvision.index') }}">Vision & Mission</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.home_block_types.index']) ? 'active' : '' }}"><a href="{{ route('admin.home_block_types.index') }}">Home Block Types</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.missionvision.index']) ? 'active' : '' }}"><a href="{{ route('admin.missionvision.index') }}">Home Blocks</a></li>
                </ul>
            </li>
            @endcan
            @php
                $department = ['admin.department.index', 'admin.department.create'];
            @endphp
            @can('add-department')
            <li class="{{ in_array($currentUrl, $department) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Departments</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.department.index']) ? 'active' : '' }}"><a href="{{ route('admin.department.index') }}">All Departments</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.department.create']) ? 'active' : '' }}"><a href="{{ route('admin.department.create') }}">Add Departments</a></li>
                </ul>
            </li>
            @endcan
            @php
                $institutes = ['admin.institutes.index', 'admin.institutes.create'];
            @endphp
            @can('add-department')
            <li class="{{ in_array($currentUrl, $institutes) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Institutes</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.institutes.index']) ? 'active' : '' }}"><a href="{{ route('admin.institutes.index') }}">All Institute</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.institutes.create']) ? 'active' : '' }}"><a href="{{ route('admin.institutes.create') }}">Add Institute</a></li>
                </ul>
            </li>
            @endcan
            @php
                $students = ['admin.students-page.index', 'admin.students-page.create'];
            @endphp
            @can('add-department')
            <li class="{{ in_array($currentUrl, $students) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Students Page</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.students-page.index']) ? 'active' : '' }}"><a href="{{ route('admin.students-page.index') }}">All Student Pages</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.students-page.create']) ? 'active' : '' }}"><a href="{{ route('admin.students-page.create') }}">Add Student Pages</a></li>
                </ul>
            </li>
            @endcan
            @php
                $faculties = ['admin.faculties.index', 'admin.faculties.create'];
            @endphp
            @can('add-department')
            <li class="{{ in_array($currentUrl, $faculties) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Faculties</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.faculties.index']) ? 'active' : '' }}"><a href="{{ route('admin.faculties.index') }}">All Faculties</a></li>

                    <li class="{{ in_array($currentUrl, ['admin.faculties.create']) ? 'active' : '' }}"><a href="{{ route('admin.faculties.create') }}">Add Faculty</a></li>
                </ul>
            </li>
            @endcan
            @php
                $programs = ['admin.programs.index', 'admin.programs.create'];
            @endphp
            @can('add-department')
            <li class="{{ in_array($currentUrl, $programs) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Programs</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.programs.index']) ? 'active' : '' }}"><a href="{{ route('admin.programs.index') }}">All Programs</a></li>

                    <li class="{{ in_array($currentUrl, ['admin.programs.create']) ? 'active' : '' }}"><a href="{{ route('admin.programs.create') }}">Add Program</a></li>
                </ul>
            </li>
            @endcan

            @php
                $news = ['admin.news.index', 'admin.news.add'];
                $events = ['admin.events.index', 'admin.events.create'];
                $notices = ['admin.notices.index', 'admin.notices.create'];
                $libraries = ['admin.libraries.index', 'admin.libraries.create'];
                $academic_calendars = ['admin.academic_calendars.index', 'admin.academic_calendars.create'];
                $offices = ['admin.offices.index', 'admin.offices.create'];
                $researchs = ['admin.researchs.index', 'admin.researchs.create'];
            @endphp
            <li class="{{ in_array($currentUrl, $offices) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Offices</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.offices.index']) ? 'active' : '' }}"> <a href="{{ route('admin.offices.index') }}">Office List</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.offices.create']) ? 'active' : '' }}"> <a href="{{ route('admin.offices.create') }}">Add office</a></li>
                </ul>
            </li>
            <li class="{{ in_array($currentUrl, $news) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>News</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.news.index']) ? 'active' : '' }}"> <a href="{{ route('admin.news.index') }}">News List</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.news.create']) ? 'active' : '' }}"> <a href="{{ route('admin.news.create') }}">Add News</a></li>
                </ul>
            </li>
            <li class="{{ in_array($currentUrl, $libraries) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Library</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.libraries.index']) ? 'active' : '' }}"> <a href="{{ route('admin.libraries.index') }}">Libraries List</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.libraries.create']) ? 'active' : '' }}"> <a href="{{ route('admin.libraries.create') }}">Add Library</a></li>
                </ul>
            </li>
            <li class="{{ in_array($currentUrl, $academic_calendars) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Academic Calendars</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.academic_calendars.index']) ? 'active' : '' }}"> <a href="{{ route('admin.academic_calendars.index') }}">Calendar List</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.academic_calendars.create']) ? 'active' : '' }}"> <a href="{{ route('admin.academic_calendars.create') }}">Add Calender</a></li>
                </ul>
            </li>
            <li class="{{ in_array($currentUrl, $events) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Events</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.events.index']) ? 'active' : '' }}"> <a href="{{ route('admin.events.index') }}">Event List</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.events.create']) ? 'active' : '' }}"> <a href="{{ route('admin.events.create') }}">Add Event</a></li>
                </ul>
            </li>
            <li class="{{ in_array($currentUrl, $notices) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Notices</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.notices.index']) ? 'active' : '' }}"> <a href="{{ route('admin.notices.index') }}">Notice List</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.notices.create']) ? 'active' : '' }}"> <a href="{{ route('admin.notices.create') }}">Add Notice</a></li>
                </ul>
            </li>
            <li class="{{ in_array($currentUrl, $researchs) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Researches</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, ['admin.researchs.index']) ? 'active' : '' }}"> <a href="{{ route('admin.researchs.index') }}">Research List</a></li>
                    <li class="{{ in_array($currentUrl, ['admin.researchs.create']) ? 'active' : '' }}"> <a href="{{ route('admin.researchs.create') }}">Add Research</a></li>
                </ul>
            </li>
            @php
                $permissions = ['admin.permissions.index', 'admin.permissions.add'];
                $roles = ['admin.roles.index', 'admin.roles.create'];
            @endphp
            @can("add-roles")
            <li class="{{ in_array($currentUrl, $permissions) || in_array($currentUrl, $roles) ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-key"></i><span>Role & Permissions</span> </a>
                <ul class="ml-menu">
                    <li class="{{ in_array($currentUrl, $permissions) ? 'active' : '' }}"><a href="{{ route('admin.permissions.index') }}">All Permissions</a></li>
                    <li class="{{ in_array($currentUrl, $roles) ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                </ul>
            </li>
            @endcan

            <li class="{{ in_array($currentUrl, ['admin.images.index']) ? 'active' : '' }}"><a href="{{ route('admin.images.index') }}"><i class="zmdi zmdi-view-web"></i><span>Images</span></a></li>

            <li class="{{ in_array($currentUrl, ['admin.settings.index']) ? 'active' : '' }}"><a href="{{ route('admin.settings.index') }}"><i class="zmdi zmdi-settings"></i><span>Settings</span></a></li>
            <li style="height: 100px;">
                 
            </li>

        </ul>
    </div>
    <!-- #Menu -->
</aside>
