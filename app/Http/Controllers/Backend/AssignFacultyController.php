<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Permissions\Role;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;

class AssignFacultyController extends Controller
{
    function AssignDeanIndex(Request $request){
        $this->data['faculties'] = Faculty::all();
        $teacherRole = Role::where('name', 'teacher')->first();
        dd($teacherRole->users);
        $this->data['users'] = $teacherRole->users;

    }
    function AssignDeanStore(Request $request){
        $data = $request->validate([
            'faculty_id' => 'required',
            'user_id' => 'required'
        ]);
    }
}
