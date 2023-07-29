<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use App\Models\Department;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\HistoricalOutline;
use App\Models\HonorisCausa;
use App\Models\Institutes;
use App\Models\LeaderShip;
use App\Models\Library;
use App\Models\News;
use App\Models\Notice;
use App\Models\Pages;
use App\Models\Program;
use App\Models\Research;
use App\Models\Slider;
use App\Models\StudentsPages;
use App\Models\UniversityGlance;
use App\Models\UniversityOrdinance;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\ViceChancellor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){



        $this->data['vc'] = LeaderShip::whereSlug('vice-chancellor')->first();
        $this->data['sliders'] = Slider::where('isActive', 1)->get();
        $this->data['leaderships'] = LeaderShip::whereNot('slug', 'vice-chancellor')->get();
        $this->data['newses'] = News::orderBy('id', 'DESC')->take(5)->get();
        $this->data['events'] = Event::orderBy('id', 'DESC')->take(5)->get();
        $this->data['notices'] = Notice::orderBy('id', 'DESC')->take(5)->get();
        $this->data['page'] = Pages::whereSlug('welcome-message')->first();
        return view('frontend.index', $this->data);
    }
    function notices(){
        $this->data['notices'] = Notice::orderBy('id', 'DESC')->paginate(12);

        return view('frontend.notices', $this->data);
    }
    function noticeShow($slug){
        $this->data['notice'] = Notice::where('slug', $slug)->first();
        $this->data['notices'] = Notice::orderBy('id', "DESC")->get();

        return view('frontend.notice-show', $this->data);
    }

    function outlineHistoric(){
        $this->data['outlines'] = HistoricalOutline::orderBy('year', 'DESC')->get();

        return view('frontend.About.historic', $this->data);
    }

    function universityGlance(){
        $this->data['glances'] = UniversityGlance::all();

        return view('frontend.About.university-glance', $this->data);
    }

    function honorisCausas(){
        $this->data['awards'] = HonorisCausa::orderBy('year', 'ASC')->get();

        return view('frontend.About.honoris-causa', $this->data);
    }


    function ViceChancellors(){
        $this->data['items'] = ViceChancellor::orderBy('from', 'DESC')->get();

        return view('frontend.About.vice-chancenllors', $this->data);
    }

    function ViceChancellorsMessage($slug) {
        $this->data['data'] = LeaderShip::whereSlug($slug)->first();

        return view('frontend.About.message', $this->data);
    }

    function universityOrdinances(){
        $this->data['items'] = UniversityOrdinance::orderBY('id', 'DESC')->get();

        return view("frontend.About.university-ordinances", $this->data);
    }

    function faculties(){
        $this->data['faculties'] = Faculty::all();


        return view('frontend.faculties.faculties', $this->data);
    }


    function departments(Request $request){
        $input = $request->input('name');
        $select = $request->input('faculty');
        if($input || $select){
            $this->data['departments'] = Department::query()
            ->where('name', 'LIKE', "%$input%")
            ->where('faculty_id', $select)
            ->get();
        }else{

            $this->data['departments'] = Department::all();
        }
        $this->data['faculties'] = Faculty::all();

        return view('frontend.departments.departments', $this->data);
    }
    function institutes(){
        $this->data['institutes'] = Institutes::all();
        return view('frontend.institutes.index', $this->data);
    }




    function programs(Request $request){
        $input = $request->input('name');
        $select = $request->input('department');
        if($input || $select){
            $this->data['programs'] = Program::query()
            ->where('title', 'LIKE', "%$input%")
            ->where('department_id', $select)
            ->get();
        }else{

            $this->data['programs'] = Program::all();
        }
        $this->data['departments'] = Department::all();

        return view('frontend.programs.programs', $this->data);
    }
    function programShow($slug){
        $this->data['data'] = Program::whereSlug($slug)->first();
        return view('frontend.programs.show', $this->data);
    }

    function PageSlug($slug){
        $this->data['item'] = Pages::whereSlug($slug)->first();

        return view('frontend.About.page', $this->data);
    }
    function studentPage($slug){
        $this->data['item'] = StudentsPages::whereSlug($slug)->first();

        return view('frontend.studentpage', $this->data);
    }
    function newsShow($slug){
        $this->data['notice'] = News::whereSlug($slug)->first();

        return view('frontend.news_show', $this->data);
    }

    function eventShow($slug){
        $this->data['notice'] = Event::whereSlug($slug)->first();

        return view('frontend.eventshow', $this->data);
    }
    function news(){
        $this->data['news'] = News::orderBy('id', 'DESC')->paginate(10);

        return view('frontend.news', $this->data);
    }
    function events(){
        $this->data['events'] = Event::orderBy('id', 'DESC')->paginate(10);

        return view('frontend.events', $this->data);
    }

    function researchs(){
        $this->data['researchs'] = Research::paginate(10);

        return view('frontend.researchs', $this->data);
    }
    function researchsShow($slug){

        $this->data['research'] = Research::whereSlug($slug)->first();
        $this->data['researchs'] = Research::take(10)->get();

        return view('frontend.research-show', $this->data);
    }
    function libraries(){
        $this->data['libraries'] = Library::paginate(10);

        return view('frontend.libraries', $this->data);
    }

    function academicCalendar($faculty = null, $department = null){
        $this->data['faculties'] = Faculty::all();

        return view('frontend.calendars.index', $this->data);
    }
    function CalendarsHtml($id){
        $data = AcademicCalendar::where('department_id', $id)->get();

        $html = view('frontend.calendars.partials', compact($data))->render();

        return response()->json(['status'=>true, 'html' => $html]);
    }

}
