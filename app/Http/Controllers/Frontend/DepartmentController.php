<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Image;
use App\Models\MissionVission;
use App\Models\News;
use App\Models\Notice;
use App\Models\Program;
use App\Models\Research;
use App\Models\Slider;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function departmentShow($slug){
        $department = Department::whereSlug($slug)->first();
        $this->data['department'] = $department;
        $this->data['programs'] = Program::where('department_id', $department->id)->get();
        $this->data['sliders'] = Slider::where('isActive', 1)
        ->where('department_id', $department->id)
        ->where('select_for', "department")
        ->get();
        $this->data['newses'] = News::where('depertment_id', $department->id)->get();
        $this->data['notices'] = Notice::where('depertment_id', $department->id)->get();
        $this->data['images'] = Image::where('department_id', $department->id)->get();
        $this->data['researchs'] = Research::where('department_id', $department->id)->get();
        return view('frontend.departments.show', $this->data);
    }
    function missionShow($slug){
        $department = Department::whereSlug($slug)->first();
        $data['department'] = $department;
        $data['data'] = MissionVission::where('department_id', $department->id)->first();

        return view('frontend.mission', $data);
    }
}
