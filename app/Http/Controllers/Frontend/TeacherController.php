<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function getDeans(){
        $this->data['deans'] = Faculty::all();

        return view('frontend.faculties.deans', $this->data);
    }

    function getHeads(Request $request){
        $input = $request->input('name');
        $select = $request->input('faculty');
        $query=Department::with('user');

        if($input){

            $query->whereHas('user', function($row) use($input){
                $row->where('name', 'LIKE', "%$input%");

            });
        }

        if($select){
            $query->where('faculty_id', $select);
        }

        $this->data['departments'] = $query->get();

        $this->data['faculties'] = Faculty::all();

        return view('frontend.departments.heads', $this->data);
    }
}
