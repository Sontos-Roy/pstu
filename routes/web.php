<?php

use App\Http\Controllers\Backend\AcademicCalendarController;
use App\Http\Controllers\Backend\DepertmentController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\FacultyController;
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
use App\Http\Controllers\Backend\InsituteController;
use App\Http\Controllers\Backend\LeaderShipController;
use App\Http\Controllers\Backend\LibrariesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\OfficeController;
use App\Http\Controllers\Backend\Permissions\RoleController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\UploadController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\DepartmentController;
use App\Http\Controllers\Frontend\FacultiesController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InstituteController;
use App\Http\Controllers\Frontend\TeacherController as FrontendTeacherController;
use App\Models\UniversityOrdinance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Frontend
Route::group(['as'=>'front.'], function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('home');
        Route::get('/notices', 'notices')->name('notices');
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
        Route::get('/events', 'events')->name('events');
        Route::get('/news/{slug}', 'newsShow')->name('news.show');
        Route::get('/university-ordinances', 'universityOrdinances')->name('university.ordinances');
        Route::get('/p/{slug}', 'PageSlug')->name('page.show');
        Route::get('/students/{slug}', 'studentPage')->name('student.page');
    });

    Route::controller(FacultiesController::class)->group(function(){
        Route::group(['prefix' => 'faculty', 'as' => 'faculties.'], function(){
            Route::get('/{slug}', 'facultyShow')->name('show');
            Route::get('/intro/{slug}', 'facultyIntro')->name('intro');
        });
    });
    Route::controller(InstituteController::class)->group(function(){
        Route::group(['prefix' => 'institue', 'as' => 'institutes.'], function(){
            Route::get('/{slug}', 'instituteShow')->name('show');
            Route::get('/intro/{slug}', 'instituteShowIntro')->name('intro');
        });
    });

    Route::controller(DepartmentController::class)->group(function(){
        Route::group(['prefix'=>'department','as'=>'departments.'], function() {

            Route::get('/{slug}', 'departmentShow')->name('show');
            Route::get('/intro/{slug}', 'departmentShow')->name('intro');

        });
    });

    Route::controller(FrontendTeacherController::class)->group(function(){
        Route::get('dean-or-faculties', 'getDeans')->name('get.deans');
        Route::get('head-of-departments', 'getHeads')->name('get.heads');
    });
});

// Frontend

Route::group(['middleware' => ['auth', 'role:Admin'], 'as' => 'admin.', 'prefix'=>'admin'], function(){
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
    Route::resource('/users', TeacherController::class);
    Route::resource('/department', DepertmentController::class);
    Route::resource('/faculties', FacultyController::class);
    Route::resource('/settings', SettingController::class);
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
});
Auth::routes();


