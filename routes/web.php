<?php

use App\Models\UniversityOrdinance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AcademicCalendarController;
use App\Http\Controllers\Backend\AcademicCouncilController;
use App\Http\Controllers\Backend\AdmissionController;
use App\Http\Controllers\Backend\AssignDepartmentController;
use App\Http\Controllers\Backend\AssignFacultyController;
use App\Http\Controllers\Backend\DepertmentController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\FacultyController;
use App\Http\Controllers\Backend\FinanceCommitteeController;
use App\Http\Controllers\Backend\Front\HistoricalOutlineController;
use App\Http\Controllers\Backend\Front\HonorisCausaController;
use App\Http\Controllers\Backend\Front\PageController;
use App\Http\Controllers\Backend\Front\SliderController;
use App\Http\Controllers\Backend\Front\UniversityGlanceController;
use App\Http\Controllers\Backend\Front\UniversityOrdinanceController;
use App\Http\Controllers\Backend\Front\ViceChancellorController;
use App\Http\Controllers\Backend\Front\VisionMissionController;
use App\Http\Controllers\Backend\HomeBlockTypeController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\InsituteController;
use App\Http\Controllers\Backend\LeaderShipController;
use App\Http\Controllers\Backend\LibrariesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\OfficeController;
use App\Http\Controllers\Backend\Permissions\RoleController;
use App\Http\Controllers\Backend\PlanningWorkCommitteeController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\RegentBoardController;
use App\Http\Controllers\Backend\ResearchCentercontroller;
use App\Http\Controllers\Backend\ResearchController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\UploadController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\DepartmentController;
use App\Http\Controllers\Frontend\FacultiesController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InstituteController;
use App\Http\Controllers\Frontend\OfficeController as FrontendOfficeController;
use App\Http\Controllers\Frontend\TeacherController as FrontendTeacherController;

use App\Http\Controllers\Frontend\UserController as FrontendUserController;



use App\Http\Controllers\Backend\UserCourseController;
use App\Http\Controllers\Backend\UserAwardController;
use App\Http\Controllers\Backend\UserEducationController;
use App\Http\Controllers\Backend\UserMembershipController;
use App\Http\Controllers\Backend\UserResearchInterestController;
use App\Http\Controllers\Backend\UserExperienceController;
use App\Http\Controllers\Backend\UserResearchSupervisionController;
use App\Http\Controllers\Backend\UserPublicationController;
use App\Http\Controllers\Backend\UserProjectController;
use App\Http\Controllers\Backend\DesignationController;
use App\Http\Controllers\Backend\NocController;
use App\Http\Controllers\Backend\PageSectionManageController;
use App\Http\Controllers\Frontend\CommitteeController;
use App\Http\Controllers\Frontend\ResearchController as FrontendResearchController;
use App\Http\Controllers\Frontend\StudentControler;


Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix'=>'admin'], function(){

    Route::resource('user-course', UserCourseController::class, ['names'=>'user_course']);
    Route::resource('user-awards', UserAwardController::class, ['names'=>'user_awards']);
    Route::resource('user-educations', UserEducationController::class,['names'=>'user_educations']);
    Route::resource('user-memberships', UserMembershipController::class,['names'=>'user_memberships']);
    Route::resource('user-experience', UserExperienceController::class,['names'=>'user_experience']);
    Route::resource('user-research-interest', UserResearchInterestController::class,['names'=>'user_research_interest']);
    Route::resource('user-research-supervision', UserResearchSupervisionController::class,['names'=>'user_research_supervision']);
    Route::resource('user-publications', UserPublicationController::class,['names'=>'user_publications']);
    Route::resource('user-projects', UserProjectController::class,['names'=>'user_projects']);
    Route::resource('designations', DesignationController::class);
    Route::resource('noces', NocController::class);
    Route::resource('users', UserController::class);

});


Route::group(['as'=>'front.'], function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('home');
        Route::get('/notices', 'notices')->name('notices');
        Route::get('/block/{slug}', 'blockShow')->name('block.show');
        Route::get('/block/details/{slug}', 'blockDetailsShow')->name('block.details.show');
        Route::get('/departments', 'departments')->name('departments');
        Route::get('/programs', 'programs')->name('programs');
        Route::get('/libraries', 'libraries')->name('libraries');
        Route::get('/programs/{slug}', 'programShow')->name('programs.show');
        Route::get('/faculties', 'faculties')->name('faculties.all');
        Route::get('/institutes', 'institutes')->name('institutes.all');
        Route::get('/about/historical-outline', 'outlineHistoric')->name('historic.outline');
        Route::get('/about/university-glance', 'universityGlance')->name('university.glance');
        Route::get('/honoris-causa', 'honorisCausas')->name('honoris.causa');
        Route::get('/vice-chencellors-list', 'ViceChancellors')->name('vice.chencellors');
        Route::get('/vice-chencellors/{slug}', 'ViceChancellorsMessage')->name('vice.chencellors.message');
        Route::get('/notices/{slug}', 'noticeShow')->name('notices.show');
        Route::get('/events/{slug}', 'eventShow')->name('events.show');
        Route::get('/news', 'news')->name('news');
        Route::get('/researchs', 'researchs')->name('researchs');
        Route::get('/researchs/{slug}', 'researchsShow')->name('researchs.show');
        Route::get('/events', 'events')->name('events');
        Route::get('/news/{slug}', 'newsShow')->name('news.show');
        Route::get('/university-ordinances', 'universityOrdinances')->name('university.ordinances');
        Route::get('/p/{slug}', 'PageSlug')->name('page.show');
        Route::get('/students/{slug}', 'studentPage')->name('student.page');
        Route::get('/academic-calender/{faculty?}', 'academicCalendar')->name('academic.calendar');
        Route::get('get-calendars', 'CalendarsHtml')->name('get.calendars');
        Route::get('admission/{slug}', 'getAdmissions')->name('get.admissions');
        Route::get('/noc-list', 'getNoc')->name('noc.list');

        Route::get('/page-view/{slug}', 'pageView')->name('pageView');
        Route::get('/faculty/page-view/{slug}', 'facultyPageView')->name('facultyPageView');
        Route::get('/department/page-view/{slug}', 'departmentPageView')->name('departmentPageView');

    });

    Route::controller(FacultiesController::class)->group(function(){
        Route::group(['prefix' => 'faculty', 'as' => 'faculties.'], function(){
            Route::get('/{slug}', 'facultyShow')->name('show');
            Route::get('/{slug}/intro', 'facultyIntro')->name('intro');
            Route::get('/{slug}/mission', 'missionShow')->name('mission');
            Route::get('{slug}/departments', 'getDepartments')->name('departments');
            Route::get('{slug}/calendars', 'getCalendar')->name('calendar');
        });
    });
    Route::controller(InstituteController::class)->group(function(){
        Route::group(['prefix' => 'institute', 'as' => 'institutes.'], function(){
            Route::get('/directors', 'directors')->name('directors');
            Route::get('/{slug}', 'instituteShow')->name('show');
            Route::get('/{slug}/intro', 'instituteShowIntro')->name('intro');
        });
    });

    Route::controller(DepartmentController::class)->group(function(){
        Route::group(['prefix'=>'department','as'=>'departments.'], function() {

            Route::get('/{slug}', 'departmentShow')->name('show');
            Route::get('/intro/{slug}', 'departmentShow')->name('intro');
            Route::get('/{slug}/mission', 'missionShow')->name('mission');
            Route::get('/{slug}/calendar', 'calendarShow')->name('calendar');
            Route::get('/{slug}/peoples', 'peoples')->name('peoples');

        });
    });

    Route::controller(FrontendTeacherController::class)->group(function(){
        Route::get('dean-or-faculties', 'getDeans')->name('get.deans');
        Route::get('head-of-departments', 'getHeads')->name('get.heads');
    });
    Route::controller(FrontendOfficeController::class)->group(function(){
        Route::get('offices', 'allOffices')->name('all.offices');
        Route::get('office/{slug}', 'officeShow')->name('office.show');
        Route::get('officers', 'Officers')->name('officers');
        Route::get('officers/{id}', 'OfficersShow')->name('officers.show');
    });
    Route::controller(FrontendUserController::class)->group(function(){
        Route::get('user-profile/{id}', 'userProfile')->name('user.profile');
    });
    Route::controller(StudentControler::class)->group(function(){
        Route::get('pstu-form', 'pstuForm')->name('pstu.form');
        Route::get('pstu-scholarship-form', 'ScholarForm')->name('pstu.scholarship');
        Route::post('marksheet', 'marksheetStore')->name('marksheet.store');
        Route::post('scholarship-apply', 'ScholarStore')->name('scholarship.store');
    });

    Route::controller(CommitteeController::class)->group(function(){
        Route::get('regent-board', 'regentBoard')->name('regent_borad');
        Route::get('finance-committee', 'financeCommittee')->name('finanace_committee');
        Route::get('academic-council', 'academicCouncil')->name('academic_council');
        Route::get('planing-work-committee', 'planningWorkCommittee')->name('planning_work_committee');
    });

    Route::controller(FrontendResearchController::class)->group(function(){
        Route::get('research-centers', 'ResearchCenters')->name('research_center');
        Route::get('research-centers/directors', 'ResearchCenterDirectors')->name('research_center.directors');
        Route::get('research-centers/{slug}', 'ResearchCenterShow')->name('research_center.show');
    });
});

// Frontend

Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix'=>'admin'], function(){
    Route::get('/', function () {
        return redirect()->route('admin.home');
    });
    Route::get('/home', [BackendHomeController::class, 'index'])->name('home');
    Route::resource('/roles', RoleController::class);
    Route::get('/permissions', [RoleController::class, 'allPermissions'])->name('permissions.index');
    Route::get('/permissions/add', [RoleController::class, 'addPermissions'])->name('permissions.add');
    Route::get('/permissions/{id}/edit', [RoleController::class, 'editPermission'])->name('permissions.edit');
    Route::post('/permissions/store', [RoleController::class, 'storePermission'])->name('permissions.store');
    Route::put('/permissions/update/{id}', [RoleController::class, 'updatePermission'])->name('permissions.update');
    Route::delete('/permissions/{id}/delete', [RoleController::class, 'deletePermission'])->name('permissions.delete');

    Route::resource('/teachers', TeacherController::class);
    Route::post('/user-profile/{id}', [TeacherController::class, 'userProfile'])->name('user.userProfile');
    Route::post('password_change', [TeacherController::class, 'changePassword'])->name('changePass');
    Route::resource('/department', DepertmentController::class);
    Route::resource('/faculties', FacultyController::class);
    Route::get('/assign-faculty', [AssignFacultyController::class, 'AssignDeanIndex'])->name('assign.faculty.index');
    Route::get('/assign-faculty/{id?}', [AssignFacultyController::class, 'AssignDeanEdit'])->name('assign.faculty.edit');
    Route::post('/assign-faculty', [AssignFacultyController::class, 'AssignDeanStore'])->name('assign.faculty.store');
    Route::get('/assign-department-head', [AssignDepartmentController::class, 'AssignDeptIndex'])->name('assign.department.head.index');
    Route::get('/assign-department-head/{id?}', [AssignDepartmentController::class, 'AssignDeptEdit'])->name('assign.department.head.edit');
    Route::post('/assign-department-head', [AssignDepartmentController::class, 'AssignDeptStore'])->name('assign.department.head.store');
    Route::resource('/settings', SettingController::class);
    Route::resource('/page-section-manage', PageSectionManageController::class, ['names' => 'page_sections']);
    Route::post('/change-slider-status/{id}', [SliderController::class, 'changeStatus'])->name('change.slider.status');
    Route::resource('/leadership', LeaderShipController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/events', EventController::class);
    Route::resource('/libraries', LibrariesController::class);
    Route::resource('/notices', NoticeController::class);
    Route::resource('/home-block-types', HomeBlockTypeController::class,['names'=>'home_block_types']);
    Route::resource('/offices', OfficeController::class);
    Route::resource('/academic_calendars', AcademicCalendarController::class);
    Route::resource('/institutes', InsituteController::class);
    Route::resource('/programs', ProgramController::class);
    Route::resource('/images', ImageController::class);
    Route::resource('/researchs', ResearchController::class);
    Route::resource('/research-center', ResearchCentercontroller::class, ['names' => 'research_center']);
    Route::resource('/regent-board', RegentBoardController::class,['names' => 'regent_board']);
    Route::resource('/planning-work-committee', PlanningWorkCommitteeController::class,['names' => 'planning_work_committee']);
    Route::resource('/academic-council', AcademicCouncilController::class,['names' => 'academic_council']);
    Route::resource('/finance-committee', FinanceCommitteeController::class,['names' => 'finance_committee']);
    Route::post('/image-upload', [UploadController::class, 'index'])->name('ckeditor.upload');

    // Front
    Route::resource('/sliders', SliderController::class);
    Route::resource('/historical-outline', HistoricalOutlineController::class);
    Route::resource('/university-glance', UniversityGlanceController::class);
    Route::resource('/honoris-causas', HonorisCausaController::class);
    Route::resource('/vice-chanchellors', ViceChancellorController::class);
    Route::resource('/university-ordinances', UniversityOrdinanceController::class);
    Route::resource('/pages', PageController::class);
    Route::resource('/students-page', StudentController::class);
    Route::resource('/missionvision', VisionMissionController::class);
    Route::post('change-page-status/{id}', [PageController::class, 'changeStatus'])->name('change.page.status');
    Route::get('get-departments', [BackendHomeController::class, 'getDepartments'])->name('get.departments');
    Route::resource('/admissions', AdmissionController::class);


});

Auth::routes();


