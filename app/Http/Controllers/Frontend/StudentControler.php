<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\StudentMarkSheet;
use Illuminate\Http\Request;

class StudentControler extends Controller
{
    function pstuForm(){
        return view('frontend.students.form');
    }


    function marksheetStore(Request $request){
        $data = $request->validate([
            'name' => '',
            'student_id' => '',
            'program' => '',
            'year' => '',
            'email' => '',
            'phone' => '',
            'document' => '',
            'document_type' => '',
        ]);

        StudentMarkSheet::create($data);

        return back()->with('success', 'Application Submited Successfully');
    }
    function ScholarForm(){
        return view('frontend.students.scholarships');
    }

    function ScholarStore(Request $request){
        $data = $request->validate([
            'name' => '',
            'student_id' => '',
            'program' => '',
            'year' => '',
            'email' => '',
            'phone' => '',
            'type' => '',
        ]);

        Scholarship::create($data);
        return back()->with('success', 'Application Submited Successfully');
    }
}
