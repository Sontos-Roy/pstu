<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Program;
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
        return view('frontend.departments.show', $this->data);
    }
}
