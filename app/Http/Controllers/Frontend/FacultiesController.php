<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\MissionVission;
use App\Models\News;
use App\Models\Notice;
use App\Models\Research;
use App\Models\Slider;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    function facultyShow($slug){
        $faculty = Faculty::whereSlug($slug)->first();
        $this->data['faculty'] = $faculty;
        $departments = Department::where('faculty_id', $faculty->id);
        $departmentsId = $departments->pluck('id');

        $this->data['mission'] = MissionVission::where('faculty_id', $faculty->id)->first();

        $this->data['departments'] = $departments->get();
        $this->data['newses'] = News::orderBy('id', 'DESC')->whereIn('depertment_id', $departmentsId)->take(6)->get();
        $this->data['researchs'] = Research::orderBy('id', 'DESC')->whereIn('department_id', $departmentsId)->take(6)->get();
        $this->data['sliders'] = Slider::where('isActive', 1)
        ->where('faculty_id', $faculty->id)
        ->where('select_for', "faculty")
        ->get();
        $this->data['notices'] = Notice::whereIn('depertment_id', $departmentsId)->get();

        return view('frontend.faculties.faculties_show', $this->data);
    }
    function facultyIntro($slug){
        $faculty = Faculty::whereSlug($slug)->first();
        $this->data['data'] = $faculty;

        return view('frontend.faculties.introduction', $this->data);
    }
}
