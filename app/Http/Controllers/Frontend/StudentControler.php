<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudentMarkSheet;
use Illuminate\Http\Request;

class StudentControler extends Controller
{
    function pstuForm(){
        return view('frontend.students.form');
    }

    function marksheetStore(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'program' => 'required',
            'year' => 'required',
            'document' => 'required',
            'document_type' => 'required',
        ]);

        StudentMarkSheet::create($data);

        return response()->json(['status' => true, 'msg' => 'Application Successfully Send']);
    }
}
